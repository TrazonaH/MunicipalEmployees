
// import {formatName,Name,displayActiveProducts} from './sample.js';

var app = new Vue({
    el: '#app',
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
        
    },      
    computed:{
        resultQuery(){
            if(this.searchQuery){
            return this.employees.filter((item)=>{
                return this.searchQuery.toLowerCase().split(' ').every(v => item.fname.toLowerCase().includes(v))
                // return this.searchQuery.toLowerCase().split(' ').every(v => item.endNum.includes(v))
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
    },
    methods:{
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
        }





        // //Products Module
        // displayActiveProducts: function(){
        //    const data = new FormData(); 
        //     const vue = this;
        //     data.append("fn","displayActiveProducts");
        //     axios.post('api/product_api.php',data)
        //     .then(function (r){
        //         vue.products = r.data;
        //     })
        // }, 
        // displayTopProducts: function(){
        //     const data = new FormData();
        //      const vue = this;
        //      data.append("fn","displayTopProducts");
        //      axios.post('api/product_api.php',data)
        //      .then(function (r){
        //          vue.topProducts = r.data;
        //      })
        //  },
        // displayProductSupplies: function(){
        //     const data = new FormData();
        //      const vue = this;
        //      data.append("fn","displayProductSupplies");
        //      axios.post('api/product_api.php',data)
        //      .then(function (r){
        //          vue.addedSupplies = r.data;
        //      })
        //  },
        //  displayAvailbleProducts: function(){
        //     const data = new FormData();
        //      const vue = this;
        //      data.append("fn","availableProducts");
        //      axios.post('api/product_api.php',data)
        //      .then(function (r){
        //          vue.availableProducts = parseInt(r.data[0].active);
        //      })
        //  },
        //  displayRecentProducts: function(){
        //     const data = new FormData();
        //     const vue = this;
        //     data.append("fn","displayRecentProducts");  
        //     axios.post('api/product_api.php',data)
        //     .then(function (r){
        //         vue.recentProducts = r.data;
        //     })
        //  },
        // supplyNeeded: function( supply_id,quantity){
        //     let vue = this;
        //     const data = new FormData();
        //     data.append('fn','selectSupply');
        //     data.append('supply_id',supply_id);
        //     axios.post('api/supply_api.php',data)
        //     .then(function(r){
        //         let unit = r.data;
        //         let supply = {"need_ids": supply_id, "need_qty": quantity, "need_uom": unit};
        //         if(supply.need_qty == 0 ){
        //             Swal.fire({
        //                 icon: 'error',
        //                 title: 'Oops...',
        //                 text: 'Must Fill in All of the Needed Requirements',
        //               })
        //         }
        //         else{
        //             vue.productSupplies.push(supply);
        //         }
                

        //     })
           
        // },
        // selectTransportSupply: function( supply_id,quantity){
        //     let vue = this;
        //     const data = new FormData();
        //     let added =  vue.productSupplies;
        //     data.append('fn','selectTransportSupply');
        //     data.append('supply_id',supply_id);
        //     data.append('quantity',quantity);
        //     axios.post('api/supply_api.php',data)
        //     .then(function(r){
        //         let unit = r.data;
        //         let supply = {"need_ids": supply_id, "need_qty": quantity, "need_uom": unit};
        //         if(supply.need_qty == 0 ){
        //             Swal.fire({
        //                 icon: 'error',
        //                 title: 'Oops...',
        //                 text: 'Must Fill in All of the Needed Requirements',
        //               })
        //         }
        //         else if(r.data ==1){
        //             Swal.fire({
        //                 icon: 'error',
        //                 title: 'Oops...',
        //                 text: 'Not enough Supplies',
        //               })
        //         }else{
        //             vue.productSupplies.push(supply);
        //         }
                

        //     })
           
        // },
        // selectTransportProduct: function( product_id,quantity){
        //     let vue = this;
        //     const data = new FormData();
        //     let added =  vue.productSupplies;
        //     data.append('fn','selectTransportProduct');
        //     data.append('product_id',product_id);
        //     data.append('quantity',quantity);
        //     axios.post('api/product_api.php',data)
        //     .then(function(r){
        //         let unit = r.data;
        //         let supply = {"need_ids": product_id, "need_qty": quantity, "need_uom": unit};
        //         if(supply.need_qty == 0 ){
        //             Swal.fire({
        //                 icon: 'error',
        //                 title: 'Oops...',
        //                 text: 'Must Fill in All of the Needed Requirements',
        //               })
        //         }
        //         else if(r.data ==1){
        //             Swal.fire({
        //                 icon: 'error',
        //                 title: 'Oops...',
        //                 text: 'Not enough Product Stock',
        //               })
        //         }else{
        //             vue.productSupplies.push(supply);
        //         }
                

        //     })
           
        // },
        // deleteSupplyNeeded: function(index){
        //     let self = this;
        //     self.productSupplies.splice(index,1);
        // },
        // selectSupply: function(supply_id){
        //     const data = new FormData();
        //     data.append('fn','selectSupply');
        //     data.append('supply_id',supply_id);
        //     axios.post('api/supply_api.php',data)
        //     .then(function(r){
        //         const unit = document.querySelector('[name="unit"]');
        //         unit.innerHTML= r.data;
        //     })
        // },
        // selectSupplyEdit: function(supply_id){
        //     const data = new FormData();
        //     data.append('fn','selectSupply');
        //     data.append('supply_id',supply_id);
        //     axios.post('api/supply_api.php',data)
        //     .then(function(r){
        //         const div = document.getElementById("eDiv");
        //         div.querySelector('#unit').innerHTML= r.data;
        //     })
        // },
        // addProduct: function(e){
        //      e.preventDefault();
        //     const self = this;
        //     let ids = JSON.stringify(this.productSupplies);
        //     const data = new FormData(e.currentTarget);
        //     data.append('fn','addProduct');
        //     data.append('supply_name', ids);
        //     axios.post('api/product_api.php',data)
        //     .then(function(r){
        //         console.log(r.data);
        //         if(r.data == 1){
        //             Swal.fire({
        //                     position: 'center',
        //                     icon: 'success',
        //                     title: 'Product Added Successfully!',
        //                     showConfirmButton: true,
        //                     timer: 0
        //                 });
        //                 const closeButton = document.querySelector('#closeaddproductModal');
        //                 closeButton.click();
        //                 self.displayActiveProducts();
        //                 self.sup_qty = 0;
        //                 self.sup_ids = 0;
        //                 self.productSupplies.splice(0);
        //                 // self.clearSupplyArray();
        //                 self.img = "";
        //                 // self.$refs.supplyNeeded.reset();
        //                 self.$refs.addproduct.reset();
        //         } else if(r.data == 2){
        //             Swal.fire('Empty Needed Supplies', '', 'info')
        //         } else if(r.data == 0){
        //             Swal.fire('Product Name already Existed', '', 'error')
        //         }else if(r.data == 3){
        //             Swal.fire('Upload an Image')
        //         }
        //     })
        // },
        // deleteProduct: function(product_id){
        //     const self = this;
        //    Swal.fire({
        //             title: 'Do you want to save the changes?',
        //             showDenyButton: true,
        //             showCancelButton: true,
        //             confirmButtonText: 'Save',
        //             denyButtonText: `Don't save`,
        //             }).then((result) => {
        //             if (result.isConfirmed) {
        //                 const data = new FormData();
        //                 data.append('fn','deleteProduct');
        //                 data.append('product_id',product_id);
        //                 axios.post('api/product_api.php',data);
        //                 Swal.fire('Saved!', '', 'success');
        //             } else if (result.isDenied) {
        //                 Swal.fire('Changes are not saved', '', 'info')
        //             }
        //             self.displayActiveProducts();
        //         })
        // },
        // getProductById: function(product){
        //     this.product = product;
        //     this.img = "api/"+product.img;
        // },
        // getSupplyAdded: function(added_supply){
        //     this.addedSupply = added_supply;
        // },
        // editProduct: function(e){
        //     e.preventDefault();
        //     const vue = this;
        //     const data = new FormData(e.currentTarget);
        //     let ids = JSON.stringify(this.productSupplies);
        //     data.append("fn","editProduct");
        //     data.append('supply_name', ids);
        //     data.append('product_id',this.product.product_id);
        //     axios.post('api/product_api.php',data)
        //     .then(function(r){
        //         if(r.data == 1 || r.data == 2){
        //             Swal.fire({
        //                 title: 'Update Product Successfully',
        //             })
        //             const closeButton = document.querySelector('#closeeditproductModal');
        //             closeButton.click();
        //             vue.displayActiveProducts();
        //             vue.displayProductSupplies();
        //             vue.clearImage();
        //         }else if(r.data == 3){
        //             Swal.fire({
        //                 title: 'Product Name already Existed',
        //             })
        //         }
        //         else if(r.data == 0){
        //             Swal.fire({
        //                 title: "Can't accept Empty Name",
        //             })
        //         }
        //     })
        
        // },
        // editSupplyAdded: function(e){
        //     e.preventDefault();
        //     let vue = this;
        //     const data = new FormData();
        //     let ps_id = document.querySelector('#eps_id').value;
        //     let quantity = document.querySelector('#equantity').value;
        //     data.append('fn','editSupplyAdded');
        //     data.append('ps_id',ps_id);
        //     data.append('quantity',quantity);
        //     axios.post('api/product_api.php',data)
        //     .then(function(r){
        //         Swal.fire({
        //             title: 'Updated Successfully',
        //         })
        //         const closeButton = document.querySelector('#closeSpecificSupplyModal');
        //         closeButton.click();
        //         vue.displayProductSupplies();
        //         e.target.reset();
        //     })
        // },
        // deleteSupplyAdded: function(ps_id){
        //     const self = this;
        //    Swal.fire({
        //             title: 'Do you want to Delete the Supply?',
        //             showDenyButton: true,
        //             showCancelButton: true,
        //             confirmButtonText: 'Save',
        //             denyButtonText: `Don't save`,
        //             }).then((result) => {
        //             if (result.isConfirmed) {
        //                 const data = new FormData();
        //                 data.append('fn','deleteSupplyAdded');
        //                 data.append('ps_id',ps_id);
        //                 axios.post('api/product_api.php',data);
        //                 Swal.fire('Saved!', '', 'success');
        //             } else if (result.isDenied) {
        //                 Swal.fire('Changes are not saved', '', 'info')
        //             }
        //             self.displayActiveProducts();
        //             self.displayProductSupplies();
        //         })
        // },
        // view_image: function(e){
        //      const [file] = document.querySelector('#eimg').files;
        //     if (file) {
        //         this.img = URL.createObjectURL(file)
        //     }
        // },
        // view_insert_image: function(e){
        //      const [file] = document.querySelector('#img').files;
        //     if (file) {
        //         this.img = URL.createObjectURL(file)
        //     }
        // },
        // view_employee_image: function(e){
        //      const [file] = document.querySelector('#emp_img').files;
        //     if (file) {
        //         this.employee_img = URL.createObjectURL(file)
        //     }
        // },
        // view_employee_edit_img: function(e){
        //     const [file] = document.querySelector('#eemp_img').files;
        //     if (file) {
        //         this.employee_img = URL.createObjectURL(file)
        //     }
        // },
        // makeProductAvailable: function(product_id){
        //     const self = this;
        //    Swal.fire({
        //             title: 'Do you want to make this product available?',
        //             showDenyButton: true,
        //             showCancelButton: true,
        //             confirmButtonText: 'Save',
        //             denyButtonText: `Don't save`,
        //             }).then((result) => {
        //             if (result.isConfirmed) {
        //                 const data = new FormData();
        //                 data.append('fn','makeProductAvailable');
        //                 data.append('product_id',product_id);
        //                 axios.post('api/product_api.php',data)
        //                 Swal.fire('Saved!', '', 'success')
        //             } else if (result.isDenied) {
        //                 Swal.fire('Changes are not saved', '', 'info')
        //             }
        //             self.displayActiveProducts();
        //             self.displayAvailbleProducts();
        //             self.act_product += 1;
        //             // self.options.series = [parseInt(((self.act_product/self.product_len)*100).toFixed(0))];
        //             // let value = parseInt(((self.act_product/self.product_len)*100).toFixed(0));
        //             let apex = self.$data.chart;
        //             // apex.updateSeries([value]);
        //             apex.options.series = parseInt(((self.act_product/self.product_len)*100).toFixed(0));
        //         })
        // },
        // makeProductNotAvailable: function(product_id){
        //     const self = this;
        //    Swal.fire({
        //             title: 'Do you want to make this product unavailable?',
        //             showDenyButton: true,
        //             showCancelButton: true,
        //             confirmButtonText: 'Save',
        //             denyButtonText: `Don't save`,
        //             }).then((result) => {
        //             if (result.isConfirmed) {
        //                 const data = new FormData();
        //                 data.append('fn','makeProductNotAvailable');
        //                 data.append('product_id',product_id);
        //                 axios.post('api/product_api.php',data)
        //                 Swal.fire('Saved!', '', 'success')
        //             } else if (result.isDenied) {
        //                 Swal.fire('Changes are not saved', '', 'info')
        //             }
        //             self.displayActiveProducts();
        //             self.displayAvailbleProducts();
        //             self.act_product -= 1;
        //             // var newData = this.options.series = [parseInt(((self.act_product/self.product_len)*100).toFixed(1))];
        //             let apex = self.$data.chart;
        //             // apex.updateSeries(newData);
        //             apex.options.series = parseInt(((self.act_product/self.product_len)*100).toFixed(0));
        //         })
        // },
        // filterProductsbyCategory: function(){
        //     const data = new FormData();
        //     const vue = this;
        //     // if(document.querySelector("#product_category").selected == true){
        //     //     let cat_id = document.querySelector('#product_category').value;
        //     //     data.append("product_category",cat_id);

        //     // }
        //     // else{
        //     //     let cat_id = 0;
        //     //     data.append("product_category",cat_id);
        //     // }
        //         let cat_id = document.querySelector('#product_category').value;
        //     data.append("product_category",cat_id);
        //     data.append("fn","filterProductsbyCategory");
        //     axios.post('api/product_api.php',data)
        //     .then(function (r){
        //         vue.products = r.data;
        //     })
        // },
        
    },
})