
// import {formatName,Name,displayActiveProducts} from './sample.js';
// import XLSX from "c:/xampp/htdocs/EMPLOYEE/node_modules/xlsx-style/xlsx"; 
// import { saveAs } from "../node_modules/file-saver/dist/FileSaver.js";
var app = new Vue({
    el: '#app',
    // data() {
    //     return {
    //       tableData: [
    //         { name: "John Doe", age: 30, email: "john.doe@example.com" },
    //         { name: "Jane Smith", age: 25, email: "jane.smith@example.com" },
    //         // Add more data here if needed
    //       ],
    //     };
    //   },
    data: {
        employees: [],
        employee: {},
        emp_img: 'api/uploads/default_man.jpg',
        pageName: "default",
        searchQuery: null,
        monthlyBirthdays: [],
        monthlyBirthday: {},
        NextMonths: [],
        NextMonth: {},
        increment: [],
        loyaltyBunoses: [],
        loyaltyBunos: {},
        salaryIncremented: [],
        cos: [],
        jo: [],

        emergencies: [],
        emergency: {},

        // tableData: [
        //     { name: "John Doe", age: 30, email: "john.doe@example.com" },
        //     { name: "Jane Smith", age: 25, email: "jane.smith@example.com" },
        //     // Add more data here if needed
        //   ],
    },      
    computed:{
        resultQuery(){
            if(this.searchQuery){
            return this.employees.filter((item)=>{
                return this.searchQuery.toLowerCase().split(' ').every(v => item.fname.toLowerCase().includes(v))
                // return this.searchQuery.toLowerCase().split(' ').every(v => item.id_number.includes(v))
            })
            }else{
                return this.employees;
            }
            },
    },    
    created: function() {
        this.displayEmployees();
        this.showMonthlyBirthdays();
        this.showNextMonth();
        this.displayLoyaltyBonus();
        this.displaySalaryIncremented();
        this.displaycos();
        this.displayjo();
        this.displayEmergencyHotline();
    },
    methods:{

        //for the extraction of table to excel file
        exportToExcel: function() {
            for (let i = 0; i < this.employees.length; i++) {
                console.log(this.employees[i].fname)
              }

        //     const dataToExport = [...this.employees];

        //   // Convert data to Excel format
        //   const wb = XLSX.utils.book_new();
        //   const ws = XLSX.utils.json_to_sheet(dataToExport);
        //   XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

        //   // Generate a Blob and trigger download
        //   const wbout = XLSX.write(wb, { bookType: "xlsx", type: "array" });
        //   const blob = new Blob([wbout], { type: "application/octet-stream" });
        //   saveAs(blob, "table_data.xlsx");
          },

        //Employees Modules
        displayEmployees: function(){
            const data = new FormData(); 
            const vue = this;
            // let dep = document.querySelector('#departments').value;
            data.append("fn","displayEmployees");
            // data.append('dep',dep);
            axios.post('api/employees_api.php',data)
            .then(function (r){
                vue.employees = r.data;
                // console.log("Employees");
                // console.log(vue.employees);
            })
        },
        displayIncrement: function(employee_id){
            const data = new FormData(); 
            const vue = this;
            console.log(employee_id);
            data.append("fn","displayIncrement");
            data.append("employee_id",employee_id);
            axios.post('api/employees_api.php',data)
            .then(function (r){
                if (r.data == 1){
                    // console.log("no data", r.data );
                    vue.increment = 0;
                }else{
                    vue.increment = r.data;
                }
                // console.log(r.data);
                // vue.increment = r.data;
                // console.log("increment",vue.increment);
            })
        },
        displayLoyaltyBonus: function(){
            const data = new FormData(); 
            const vue = this;
            data.append("fn","displayLoyaltyBonus");
            axios.post('api/employees_api.php',data)
            .then(function (r){
                // console.log('loyalty', r.data);
                vue.loyaltyBunoses = r.data;
            })
        },
        displaySalaryIncremented: function(){
            const data = new FormData(); 
            const vue = this;
            data.append("fn","displaySalaryIncremented");
            axios.post('api/employees_api.php',data)
            .then(function (r){
                console.log('Incremented People', r.data);
                vue.salaryIncremented = r.data;
            })
        },
        displaycos: function(){
            const data = new FormData(); 
            const vue = this;
            data.append("fn","displaycos");
            axios.post('api/employees_api.php',data)
            .then(function (r){
                vue.cos = r.data;
            })
        },
        displayjo: function(){
            const data = new FormData(); 
            const vue = this;
            data.append("fn","displayjo");
            axios.post('api/employees_api.php',data)
            .then(function (r){
                vue.jo = r.data;
            })
        },
        addEmployee: function(e){
            console.log("called script");
            e.preventDefault();
            const self = this;
            const data = new FormData(e.currentTarget);
            data.append('fn','addEmployee');
            axios.post('api/employees_api.php',data)
            .then(function(r){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Employee Added Successfully!',
                    });
                self.displayEmployees();
                self.showMonthlyBirthdays();
                self.displayLoyaltyBonus();
                const closeButton = document.querySelector('#closeaddEmployeesModal');
                closeButton.click();
                e.target.reset();
                //     if(r.data == 1){
                //         Swal.fire({
                //                 position: 'center',
                //                 icon: 'success',
                //                 title: 'Product Added Successfully!',
                //                 showConfirmButton: true,
                //                 timer: 0
                //             });
                //             const closeButton = document.querySelector('#closeaddproductModal');
                //             closeButton.click();
                //             self.displayActiveProducts();
                //             self.sup_qty = 0;
                //             self.sup_ids = 0;
                //             self.productSupplies.splice(0);
                //             // self.clearSupplyArray();
                //             self.img = "";
                //             // self.$refs.supplyNeeded.reset();
                //             self.$refs.addproduct.reset();
                //     } else if(r.data == 2){
                //         Swal.fire('Empty Needed Supplies', '', 'info')
                // } else if(r.data == 0){
                //     Swal.fire('Product Name already Existed', '', 'error')
                // }else if(r.data == 3){
                //     Swal.fire('Upload an Image')
                // }
            })
        },

        deleteEmployee: function(emp_id){
            const self = this;
               Swal.fire({
                        title: 'Do you want to delete this employee?',
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'Save',
                        denyButtonText: `Don't save`,
                        }).then((result) => {
                        if (result.isConfirmed) {
                            const data = new FormData();
                            data.append('fn','deleteEmployee');
                            data.append('employee_id',emp_id);
                            axios.post('api/employees_api.php',data);
                            Swal.fire('Saved!', '', 'success');
                        } else if (result.isDenied) {
                            Swal.fire('Changes are not saved', '', 'info')
                        }
                        self.displayEmployees();
                        self.showMonthlyBirthdays();
                        self.displayLoyaltyBonus();
                    })
        },
        editEmployee: function(e){
            const self = this;
            e.preventDefault();
                const vue = this;
                console.log("emp id", this.employee.emp_id);
                const data = new FormData(e.currentTarget);
                data.append("fn","editEmployee");
                data.append('emp_id',this.employee.emp_id);
                axios.post('api/employees_api.php',data)
                .then(function(r){
                    Swal.fire({
                        title: 'Updated Employee Successfully',
                    })
                    self.displayEmployees();
                    self.showMonthlyBirthdays();
                    self.displayLoyaltyBonus();
                    const closeButton = document.querySelector('#closeeditEmployeesModal');
                    closeButton.click();
                    e.target.reset();

                    // if(r.data == 1 || r.data == 2){
                    //     Swal.fire({
                    //         title: 'Update Product Successfully',
                    //     })
                    //     const closeButton = document.querySelector('#closeeditproductModal');
                    //     closeButton.click();
                    //     vue.displayActiveProducts();
                    //     vue.displayProductSupplies();
                    //     vue.clearImage();
                    // }else if(r.data == 3){
                    //     Swal.fire({
                    //         title: 'Product Name already Existed',
                    //     })
                    // }
                    // else if(r.data == 0){
                    //     Swal.fire({
                    //         title: "Can't accept Empty Name",
                    //     })
                    // }
                })
        },
        getEmployeesById: function(employee){
            this.employee = employee;
            this.emp_img = "api/"+employee.img;
        },

        view_insert_image: function(e){
            const [file] = document.querySelector('#emp_img').files;
           if (file) {
               this.emp_img = URL.createObjectURL(file)
           }
       },
       view_image: function(e){
            const [file] = document.querySelector('#eimg').files;
            if (file) {
                this.emp_img = URL.createObjectURL(file)
            }
        },
        showMonthlyBirthdays: function(){
            const data = new FormData(); 
            const vue = this;
            data.append("fn","showMonthlyBirthdays");
            axios.post('api/employees_api.php',data)
            .then(function (r){
                vue.monthlyBirthdays = r.data;
                console.log(vue.monthlyBirthdays);
            })
        },
        showNextMonth: function(){
            const data = new FormData(); 
            const vue = this;
            data.append("fn","showNextMonth");
            axios.post('api/employees_api.php',data)
            .then(function (r){
                vue.NextMonths = r.data;
                console.log(vue.NextMonths);
            })
        },


        //Emergency Hotlines 
        displayEmergencyHotline: function(){
            const data = new FormData(); 
            const vue = this;
            data.append("fn","displayEmergencyHotline");
            axios.post('api/employees_api.php',data)
            .then(function (r){
                vue.emergencies = r.data;
                console.log(vue.emergencies);
            })
        },
        addEmergency: function(e){
            e.preventDefault();
            const self = this;
            const data = new FormData(e.currentTarget);
            data.append('fn','addEmergency');
            axios.post('api/employees_api.php',data)
            .then(function(r){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Employee Added Successfully!',
                    });
                self.displayEmergencyHotline();
                const closeButton = document.querySelector('#closeaddEmployeesModal');
                closeButton.click();
                e.target.reset();
                //     if(r.data == 1){
                //         Swal.fire({
                //                 position: 'center',
                //                 icon: 'success',
                //                 title: 'Product Added Successfully!',
                //                 showConfirmButton: true,
                //                 timer: 0
                //             });
                //             const closeButton = document.querySelector('#closeaddproductModal');
                //             closeButton.click();
                //             self.displayActiveProducts();
                //             self.sup_qty = 0;
                //             self.sup_ids = 0;
                //             self.productSupplies.splice(0);
                //             // self.clearSupplyArray();
                //             self.img = "";
                //             // self.$refs.supplyNeeded.reset();
                //             self.$refs.addproduct.reset();
                //     } else if(r.data == 2){
                //         Swal.fire('Empty Needed Supplies', '', 'info')
                // } else if(r.data == 0){
                //     Swal.fire('Product Name already Existed', '', 'error')
                // }else if(r.data == 3){
                //     Swal.fire('Upload an Image')
                // }
            })
        },
        deleteEmergency: function(em_id){
            const self = this;
               Swal.fire({
                        title: 'Do you want to delete this Emergency Hotline?',
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'Save',
                        denyButtonText: `Don't save`,
                        }).then((result) => {
                        if (result.isConfirmed) {
                            const data = new FormData();
                            data.append('fn','deleteEmergency');
                            data.append('em_id',em_id);
                            axios.post('api/employees_api.php',data);
                            Swal.fire('Saved!', '', 'success');
                        } else if (result.isDenied) {
                            Swal.fire('Changes are not saved', '', 'info')
                        }
                        self.displayEmergencyHotline();
                    })
        },
        getEmergencyById: function(emergency){
            this.emergency = emergency;
        },
        editEmergency: function(e){
            const self = this;
            e.preventDefault();
                const vue = this;
                const data = new FormData(e.currentTarget);
                data.append("fn","editEmergency");
                data.append('em_id',this.emergency.em_id);
                axios.post('api/employees_api.php',data)
                .then(function(r){
                    Swal.fire({
                        title: 'Updated Employee Successfully',
                    })
                    self.displayEmergencyHotline();
                    const closeButton = document.querySelector('#closeeditEmergencyModal');
                    closeButton.click();
                    e.target.reset();

                    // if(r.data == 1 || r.data == 2){
                    //     Swal.fire({
                    //         title: 'Update Product Successfully',
                    //     })
                    //     const closeButton = document.querySelector('#closeeditproductModal');
                    //     closeButton.click();
                    //     vue.displayActiveProducts();
                    //     vue.displayProductSupplies();
                    //     vue.clearImage();
                    // }else if(r.data == 3){
                    //     Swal.fire({
                    //         title: 'Product Name already Existed',
                    //     })
                    // }
                    // else if(r.data == 0){
                    //     Swal.fire({
                    //         title: "Can't accept Empty Name",
                    //     })
                    // }
                })
        },

        
    },
})