<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Image\ImageRepository;
use App\Http\Requests\Image\ImageCreateRequest;
use App\Http\Requests\Image\ImageUpdateRequest;
use App\Http\Controllers\Admin\BaseController as AdminBaseController;

class ImageController extends AdminBaseController
{

    const NAME = 'Изображения';

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
        $rootDiskDir = 'visuals';
        $storagePath = strtolower(class_basename($polymorphModel)).'/'.$subDir.'/'.$imageName;
        $imageUrl = '/'.$rootDiskDir.'/'.$storagePath;
        $image = $request->file('image');

        $result = Storage::disk('visuals')->put($storagePath, File::get($image));

        if($result == false){
            Flash::add('Ошибка добавления изображения', 'error');
            return redirect(route('admin.'.strtolower(class_basename($polymorphModel)).'.edit.tabToGo', [$id, 'images']));
        }

        $imageModel = $polymorphModel->images()->create([
            'path' => $imageUrl,
            'ordering' => 50
        ]);

        $imageModel->dealWithOrder();

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

        $image = $this->imageRepository->getForEditById($id);

        if(empty($image))
            abort(404);

        $polymorphModel = $image->imagable;

        $breadcrumbs = $this->setBreadcrumbs(
            [
                ['name' => $polymorphModel->title.' : '.self::NAME, 'url' => route('admin.'.strtolower(class_basename($polymorphModel)).'.edit.tabToGo', [$polymorphModel->id, 'images'])],
                ['name' => 'Редактирование изображения', 'url' => null]
            ]
        )->breadcrumbs;

        return view('back.image.edit', compact('image', 'polymorphModel', 'breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImageUpdateRequest $request, $id)
    {
        $image = $this->imageRepository->getForEditById($id);

        $image->update($request->all());

        $image->dealWithOrder();

        Flash::add('Изображение обновлено.');

        if($request->has('apply'))
            return redirect(route('admin.image.edit', $image->id));

        $polymorphModel = $image->imagable;

        return redirect(route('admin.'.strtolower(class_basename($polymorphModel)).'.edit.tabToGo', [$polymorphModel->id, 'images']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $model, $modelId)
    {

        $polymorphModel = $this->imageRepository->polymorphModel($model, $modelId);

        if(empty($polymorphModel)){
            Flash::add('Такой родительской модели не существует. Изображение не удалено', 'error');
            return redirect(route('admin.'.strtolower(class_basename($polymorphModel)).'.edit.tabToGo', [$modelId, 'images']));
        }

        $image = $this->imageRepository->getForEditById($id);

        // image is unlinked in Image model event
        $this->imageRepository->getForEditById($id)->delete();

        Flash::add('Изображение удалено.', 'error');
        return redirect(route('admin.'.strtolower(class_basename($polymorphModel)).'.edit.tabToGo', [$modelId, 'images']));

    }
}
