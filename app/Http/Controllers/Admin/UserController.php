<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Helpers\Flash;
use Illuminate\Http\Request;
use App\Helpers\WizardHelper;
use App\Repositories\User\UserRepository;
use App\Repositories\Order\OrderRepository;
use App\Http\Controllers\Admin\BaseController as AdminBaseController;

class UserController extends AdminBaseController
{

    const NAME = 'Пользователи';

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var OrderRepository
     */
    private $orderRepository;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->userRepository = app(UserRepository::class);
        $this->orderRepository = app(OrderRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->userRepository->getAllWithPagination(self::ITEMS_PER_PAGE);

        $breadcrumbs = $this->setBreadcrumbs([['name' => self::NAME, 'url' => null]])->breadcrumbs;

        return view('back.user.index', compact('paginator', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $tabToGo = 'primary')
    {

        $breadcrumbs = $this->setBreadcrumbs(
            [
                ['name' => self::NAME, 'url' => route('admin.user.index')],
                ['name' => 'Данные пользователя', 'url' => null]
            ]
        )->breadcrumbs;

        $user = $this->userRepository->getForEditById($id);

        if(empty($user))
            abort(404);

        $orders = $this->orderRepository->getAllForUserWithPagination($user->id, self::ITEMS_PER_PAGE);

        $timezone = User::TIMEZONE;

        $stepsTotal = WizardHelper::STEPS_TOTAL;

        return view('back.user.show', compact('user', 'orders', 'timezone', 'stepsTotal', 'breadcrumbs', 'tabToGo'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->isAdmin()){
            Flash::add('Администратора нельзя удалить', 'error');
            return redirect(route('admin.user.index'));
        }

        $user->userable()->delete();

        $user->delete();

        Flash::add('Пользователь удален.', 'error');
        return redirect(route('admin.user.index'));
    }
}
