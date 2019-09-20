<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Flash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Image\ImageRepository;
use App\Http\Requests\Image\ImageCreateRequest;
use App\Http\Controllers\Admin\BaseController as AdminBaseController;

class ImageController extends AdminBaseController
{

    const NAME = 'Галереи';

    /**
     * @var ImageRepository
     */
    private $imageRepository;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->imageRepository = app(ImageRepository::class);
    }

    /**
     * Upload an image
     *
     * @param  App\Http\Requests\Image\ImageCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(ImageCreateRequest $request, $model, $id)
    {
        $polymorphModel = $this->imageRepository->polymorphModel($model, $id);

        if(empty($polymorphModel)){
            Flash::add('Такой модели не существует. Не к чему добавить изображение', 'error');
            return redirect(route('admin.'.strtolower(class_basename($polymorphModel)).'.edit.tabToGo', [$id, 'images']));
        }

        $imageName = substr(sha1(time().uniqid()), 0, 20).'.'.request()->image->getClientOriginalExtension();
        $subDir = substr($imageName, 0, 2);
        $rootDiskDir = 'img';
        $storagePath = strtolower(class_basename($polymorphModel)).'/'.$subDir.'/'.$imageName;
        $imageUrl = '/'.$rootDiskDir.'/'.$storagePath;
        $image = $request->file('image');

        $result = Storage::disk('img')->put($storagePath, File::get($image));

        if($result == false){
            Flash::add('Ошибка добавления изображения', 'error');
            return redirect(route('admin.'.strtolower(class_basename($polymorphModel)).'.edit.tabToGo', [$id, 'images']));
        }

        $polymorphModel->images()->create([
            'path' => $imageUrl
        ]);

        Flash::add('Изображение добавлено');

        return redirect(route('admin.'.strtolower(class_basename($polymorphModel)).'.edit.tabToGo', [$id, 'images']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
