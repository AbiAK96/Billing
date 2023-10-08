@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard</title>
@endsection

@section('subcontent')
        <div class="col-span-12">
            <div class="grid">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">General Report</h2>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i class="fa fa-newspaper text-dark"style="font-size: 50px;"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">10</div>
                                    <div class="text-base text-slate-500 mt-1">Today Billing Rounds</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i class="fa fa-truck text-primary"style="font-size: 50px;"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">20</div>
                                    <div class="text-base text-slate-500 mt-1">Today Total Deliveries</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i class="fa fa-thumbs-down text-warning"style="font-size: 50px;"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">30</div>
                                    <div class="text-base text-slate-500 mt-1">Today In Progress Deliveries</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i class="fa fa-thumbs-up text-success"style="font-size: 50px;"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">50</div>
                                    <div class="text-base text-slate-500 mt-1">Today Completed Deliveries</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-y flex items-center h-10">
            </div>
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">Today Paper Rounds</h2>
            </div>
            <div class="grid">
                <table class="table table-report">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">PAPER ROUND ID</th>
                            <th class="text-center whitespace-nowrap">DELIVERY DATE</th>
                            <th class="text-center whitespace-nowrap">DELIVERY STAFF</th>
                            <th class="text-center whitespace-nowrap">TOTAL DELIVERIES</th>
                            <th class="text-center whitespace-nowrap">STATUS</th>
                            <th class="text-center whitespace-nowrap">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr class="intro-x">
                                <td>
                                    <a href="" class="font-medium whitespace-nowrap">000001</a>
                                </td>
                                <td class="text-center">10-09-2023</td>
                                <td class="text-center">Not assigned</td>
                                <td class="text-center">17</td>
                                <td class="w-40">
                                    <div class="flex items-center justify-center text-success">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Actve
                                    </div>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="javascript:;" data-tw-toggle="modal" data-tw-target="#large-slide-over-size-viewpaperround" title="View Details">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection
