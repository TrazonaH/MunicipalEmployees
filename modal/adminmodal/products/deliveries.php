<div class="d-flex flex-column-fluid" v-if="pageName == 'deliveries'">
    <!--begin::Container-->
    <div class="container-fluid">
        <div class="row">
            <h1>Deliveries</h1>
        </div>
        <div clas="row table-responsive">
            <table class="table table-bordered">
                <thead class="kt-table-thead text-body">
                    <tr>
                        <th class="kt-table-cell text-center">No</th>
                        <th class="kt-table-cell text-center">Name</th>
                        <th class="kt-table-cell text-center">Type</th>
                        <th class="kt-table-cell text-center">Quantity</th>
                        <th class="kt-table-cell text-center">Unit</th>
                        <th class="kt-table-cell text-center">Quantity per Unit</th>
                        <th class="kt-table-cell text-center">Unit</th>
                        <th class="kt-table-cell text-center">Acqusition Cost</th>
                        <th class="kt-table-cell text-center">Paid Amount</th>
                        <th class="kt-table-cell text-center">Purchased by</th>
                        <th class="kt-table-cell text-center">Bound To</th>
                        <th class="kt-table-cell text-center">Supplier</th>
                        <th class="kt-table-cell text-center">Delivered</th>
                        <th class="kt-table-cell text-center">Unit</th>
                        <th class="kt-table-cell text-center">Date</th>
                        <th class="kt-table-cell text-center">Received by</th>
                        <th class="kt-table-cell text-center">Status</th>
                        <th class="kt-table-cell text-center">Options</th>
                    </tr>
                </thead>
                <tbody class="kt-table-tbody text-dark table-group-divider">
                    <tr  class="kt-table-row kt-table-row-level-0 text-info" v-for="purchase,index in purchases">
                        <td class="kt-table-cell text-center">
                            <div>{{index+1}}</div>
                        </td>
                        <td class="kt-table-cell text-center">
                            <div v-if="purchase.type == 1">
                                <div v-for="product in products" v-if="product.product_id == purchase.item_id">{{product.product_name}}</div>
                            </div>
                            <div v-if="purchase.type == 2">
                                <div v-for="supply in supplies" v-if="supply.supply_id == purchase.item_id">{{supply.supply_name}}</div>
                            </div>
                        </td>
                        <td class="kt-table-cell text-center">
                            <div v-if="purchase.type == 1">Storable</div>
                            <div v-if="purchase.type == 2">Consumable</div>
                        </td>
                        <td class="kt-table-cell text-center">
                            <div>{{purchase.quantity_whole}}</div>
                        </td>
                        <td class="kt-table-cell text-center">
                            <div v-for="UoM in UoMs" v-if="UoM.UoM_id == purchase.unit_whole">{{UoM.abbreviation}}</div>
                        </td>
                        <td>
                            <div>{{purchase.quantity_simplified}}</div>
                        </td>
                        <td class="kt-table-cell text-center">
                            <div v-for="UoM in UoMs" v-if="UoM.UoM_id == purchase.unit_simplified">{{UoM.abbreviation}}</div>
                        </td>
                        <td class="kt-table-cell text-center">
                            <div>{{purchase.acquisition_cost}}</div>
                        </td>
                        <td class="kt-table-cell text-center">
                            <div>{{purchase.total_amount}}</div>
                        </td>
                        <td class="kt-table-cell text-center">
                            <div v-for="user in users" v-if="user.userid == purchase.purchased_by">{{user.lname}},{{user.fname}}</div>
                        </td>
                        <td class="kt-table-cell text-center">
                            <div v-for="branch in branches" v-if="branch.branch_id == purchase.bound_to">{{branch.branch_name}}</div>
                        </td>
                        <td>
                            <div>{{purchase.supplier_id}}</div>
                        </td>
                        <td>
                            <div>{{purchase.received_quantity}}</div>
                        </td>
                        <td class="kt-table-cell text-center">
                            <div v-for="UoM in UoMs" v-if="UoM.UoM_id == purchase.received_unit">{{UoM.abbreviation}}</div>
                        </td>
                        <td class="kt-table-cell text-center">
                            <div>{{purchase.received_date}}</div>
                        </td>
                        <td class="kt-table-cell text-center">
                            <div v-for="user in users" v-if="user.userid == purchase.received_by">{{user.lname}},{{user.fname}}</div>
                        </td>
                        <td class="kt-table-cell text-center">
                            <div v-if="purchase.status ==0" style="color:orange">Dispatched</div>
                            <div v-if="purchase.status ==1" style="color:green">Received</div>
                        </td>
                        <td class="kt-table-cell text-center"><button class="btn btn-info" type="button" v-if="purchase.status ==0" data-toggle="modal" @click="getPurchasedById(JSON.parse(JSON.stringify(purchase)))" data-target="#checkReceived">Receive</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>