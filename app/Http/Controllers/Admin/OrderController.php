<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Helpers\Flash;
use App\Helpers\OrderHelper;
use Illuminate\Http\Request;
use App\Helpers\WizardHelper;
use App\Repositories\Order\OrderRepository;
use App\Http\Requests\Order\OrderUpdateRequest;
use App\Http\Controllers\Admin\BaseController as AdminBaseController;

class OrderController extends AdminBaseController
{

    const NAME = 'Заказы';

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
        $this->orderRepository = app(OrderRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->orderRepository->getAllWithPagination(self::ITEMS_PER_PAGE);

        $breadcrumbs = $this->setBreadcrumbs([['name' => self::NAME, 'url' => null]])->breadcrumbs;

        $stepsTotal = WizardHelper::STEPS_TOTAL;

        return view('back.order.index', compact('paginator', 'stepsTotal', 'breadcrumbs'));
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $tabToGo = 'primary')
    {
        $breadcrumbs = $this->setBreadcrumbs(
            [
                ['name' => self::NAME, 'url' => route('admin.order.index')],
                ['name' => 'Просмотр и изменение заказа', 'url' => null]
            ]
        )->breadcrumbs;

        $order = $this->orderRepository->getForEditById($id);

        if(empty($order))
        abort(404);

        $statusesList = OrderHelper::getOrderStatusesNames();

        $timezone = Order::TIMEZONE;

        return view('back.order.edit', compact('order', 'statusesList', 'timezone', 'breadcrumbs', 'tabToGo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Order\OrderUpdateRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderUpdateRequest $request, $id)
    {
        $order = $this->orderRepository->getForEditById($id);

        $order->update($request->all());

        Flash::add('Заказ обновлен');

        if($request->has('apply'))
            return redirect(route('admin.order.edit', $order->id))->withInput($request->only('tabToGo'));

        return redirect(route('admin.order.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        Flash::add('Заказ удален.', 'error');
        return redirect(route('admin.order.index'));
    }
}
