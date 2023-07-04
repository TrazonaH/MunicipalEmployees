<div class="modal " id="increment" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h3 class="modal-title" style="font-family: 'Times New Roman', Times, serif;" id="exampleModalLabel"><b>NEW EMPLOYEE</b></h3> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <table class="table table-bordered " v-if="increment == 1">
            <thead class="kt-table-thead text-body">
              <tr>
              <th class="kt-table-cell text-center"><b>Step</b></th>
                <th class="kt-table-cell text-center"><b>Salary Increment</b></th>
              </tr>
            </thead>
            <tbody class="kt-table-tbody text-dark table-group-divider">
              <tr class="kt-table-row kt-table-row-level-0 text-info" v-for="increments,index in increment" >
                <td class="kt-table-cell text-center">{{ index+1 }}</td>
                <td class="kt-table-cell text-center"><h1 style="color:red">NOT YET REGULAR</h1></td>
              </tr>
            </tbody>
 			    </table>
           <table class="table table-bordered " v-if="increment != 1" >
            <thead class="kt-table-thead text-body">
              <tr>
              <th class="kt-table-cell text-center"><b>Step</b></th>
                <th class="kt-table-cell text-center"><b>Salary Increment</b></th>
              </tr>
            </thead>
            <tbody class="kt-table-tbody text-dark table-group-divider">
              <tr class="kt-table-row kt-table-row-level-0 text-info" v-for="increments,index in increment" >
                <td class="kt-table-cell text-center">{{ index+1 }}</td>
                <td class="kt-table-cell text-center">{{ increments.month }}/{{ increments.day }}/{{ increments.year }}</td>
              </tr>
            </tbody>
 			    </table>
        </div>
      </div>

    </div>
  </div>
</div>