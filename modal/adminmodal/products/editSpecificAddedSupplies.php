<div class="modal" id="specificSupply" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="padding-top: 20px;">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" style="font-family: 'Times New Roman', Times, serif;" id="exampleModalLabel"><b>UPDATE:</b></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form @submit="editSupplyAdded">
                    <input type="number" class="form-control form-control-lg" id="eps_id" name="eps_id" v-model="addedSupply.ps_id">
                    <label class="col-form-label"><b>Supply name:</b></label>
                    <input type="text" class="form-control form-control-lg" v-for="supply in supplies" v-if="supply.supply_id == addedSupply.supply_id" v-model="supply.supply_name" readonly>
                    <label for="quantity" class="col-form-label"><b>Quantity:</b></label>
                    <input type="number" class="form-control form-control-lg" id="equantity" name="equantity" v-model="addedSupply.quantity">
                    <label class="col-form-label"><b>Unit:</b></label>
                    <input type="text" class="form-control form-control-lg" v-model="addedSupply.UoM" readonly>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="closeSpecificSupplyModal" data-target="#viewProductModal" data-toggle="modal" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>