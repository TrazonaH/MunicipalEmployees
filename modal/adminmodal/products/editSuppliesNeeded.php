<div class="modal" id="editProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-label mb-0 font-weight-bold text-body">UPDATE:</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form @submit="editProduct">
                    <div class="container-fluid">
                        <div class="row">
                            <label class="col-form-label">Supplies that is needed with its measurements. <a href="javascript:void(0)"><i>edit</i></a></label>
                            <div class="row table-bordered">
                                <table class="table table-bordered table-dark">
                                    <thead class="kt-table-thead text-body">
                                        <tr>
                                            <th class="kt-table-cell text-white text-center"><b>No.</b></th>
                                            <th class="kt-table-cell text-white text-center"><b>Supply Name</b></th>
                                            <th class="kt-table-cell text-white text-center"><b>Quantity</b></th>
                                            <th class="kt-table-cell text-white text-center"><b>UoM</b></th>
                                            <th class="kt-table-cell text-white text-center"><b>Options</b></th>
                                        </tr>
                                    </thead>
                                    <tbody class="kt-table-tbody">
                                        <tr class="kt-table-row kt-table-row-level-0 text-success" v-for="added_supply,index in addedSupplies" v-if="added_supply.product_id == product.product_id">
                                            <td class="kt-table-cell text-white text-center">{{ index+1 }}</td>
                                            <td class="kt-table-cell text-white text-center" v-for='supply in supplies' v-if='added_supply.supply_id == supply.supply_id'><input type="text" v-moodel=""></td>
                                            <td class="kt-table-cell text-white text-center">{{ added_supply.need_qty }}</td>
                                            <td class="kt-table-cell text-white text-center" v-for="UoM in UoMs" v-if='added_supply.UoM_id == UoM.UoM_id'>{{ UoM.abbreviation }}</td>
                                            <td class="kt-table-cell text-white text-center">
                                                <button class="btn btn-danger">DELETE</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>

                            <br>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="closeeditproductModal" data-target='#viewProductModal' data-toggle='modal' data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">save</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>