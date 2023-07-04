<div class="modal " id="details" tabindex="-1"  aria-hidden="true">
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
            <div>
                <img :src='emp_img' class=" rounded mx-auto d-block" alt="image" style=" height: 350px; width:400px; padding-top:10px">
            </div><br>
            <div >
                <h1 class="text-center text-danger"><b>{{employee.lname}}, {{employee.fname}} {{employee.m_i}}.</b></h1>
                <h3 class="text-center">{{employee.id_number}} - {{employee.endNum}}</h3>
                <h1 class="text-center">{{employee.department}}</h1>
            </div><br><br>
            <div class="row">
                <div class="col text-right text-success"><b><h3>Birthdate: </h3></b></div>
                <div class="col"> <h4>{{employee.birthdate}}</h4></div>
            </div>
            <!-- <div class="row">
                <div class="col text-right"><b><h3>Age: </h3></b></div>
                <div class="col"> <h4>{{employee.birthdate}}</h4></div>
            </div> -->
            <div class="row">
                <div class="col text-right text-success"><b><h3>Address: </h3></b></div>
                <div class="col"> <h4>{{employee.address}}</h4></div>
            </div>
            <div class="row">
                <div class="col text-right text-success"><b><h3>Gender: </h3></b></div>
                <div class="col"> <h4>{{employee.gender}}</h4></div>
            </div>
            <div class="row">
                <div class="col text-right text-success"><b><h3>Date of Employment: </h3></b></div>
                <div class="col"> <h4>{{employee.date_of_employment}}</h4></div>
            </div>
            

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>

    </div>
  </div>
</div>