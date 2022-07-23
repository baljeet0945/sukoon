$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  });
function deleteRecord(uri){
    //var result = confirm("Want to delete?");
    Swal.fire({
            title: 'Are you sure you want to Delete?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete',
            }).then((result) => {
            if (result.value)
            {
                $.ajax({
                    url:   uri ,
                    type: 'DELETE',

                    success: function(result) {
                       if(result.status){
                             location.reload();
                        }

                    }
                });
            }
        });
}
function updateRecord(uri){
    Swal.fire({
            title: 'Are you sure you want to Update?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Update',
            }).then((result) => {
            if (result.value)
            {
                $.ajax({
                    url:   uri ,
                    type: 'GET',
                    success: function(result) {
                       if(result.status){
                             location.reload();
                        }

                    }
                });
            }
        });
}

function deleteDailysale(uri){
    //var result = confirm("Want to delete?");
    Swal.fire({
            title: 'Are you sure you want to Delete?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete',
            }).then((result) => {
            if (result.value)
            {
                $.ajax({
                    url:   uri ,
                    type: 'DELETE',

                    success: function(result) {
                       if(result.status){
                             location.reload();
                        }

                    }
                });
            }
        });
}
function deleteExpensive(uri){
    //var result = confirm("Want to delete?");
    Swal.fire({
            title: 'Are you sure you want to Delete?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete',
            }).then((result) => {
            if (result.value)
            {
                $.ajax({
                    url:   uri ,
                    type: 'DELETE',

                    success: function(result) {
                       if(result.status){
                             location.reload();
                        }

                    }
                });
            }
        });
}
function deleteCategory(uri){
    //var result = confirm("Want to delete?");
    Swal.fire({
            title: 'Are you sure you want to Delete?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete',
            }).then((result) => {
            if (result.value)
            {
                $.ajax({
                    url:   uri ,
                    type: 'DELETE',

                    success: function(result) {
                       if(result.status){
                             location.reload();
                        }

                    }
                });
            }
        });
}
function deleteCustomer(uri){
    //var result = confirm("Want to delete?");
    Swal.fire({
            title: 'Are you sure you want to Delete?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete',
            }).then((result) => {
            if (result.value)
            {
                $.ajax({
                    url:   uri ,
                    type: 'DELETE',

                    success: function(result) {
                       if(result.status){
                             location.reload();
                        }

                    }
                });
            }
        });
}
function deleteProduct(uri){
    //var result = confirm("Want to delete?");
    Swal.fire({
            title: 'Are you sure you want to Delete?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete',
            }).then((result) => {
            if (result.value)
            {
                $.ajax({
                    url:   uri ,
                    type: 'DELETE',

                    success: function(result) {
                       if(result.status){
                             location.reload();
                        }

                    }
                });
            }
        });
}

function deleteEmployee(uri){
    //var result = confirm("Want to delete?");
    Swal.fire({
            title: 'Are you sure you want to Delete?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete',
            }).then((result) => {
            if (result.value)
            {
                $.ajax({
                    url:   uri ,
                    type: 'DELETE',

                    success: function(result) {
                       if(result.status){
                             location.reload();
                        }

                    }
                });
            }
        });
}

function deleteAdvance(uri){
    //var result = confirm("Want to delete?");
    Swal.fire({
            title: 'Are you sure you want to Delete?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete',
            }).then((result) => {
            if (result.value)
            {
                $.ajax({
                    url:   uri ,
                    type: 'DELETE',

                    success: function(result) {
                       if(result.status){
                             location.reload();
                        }

                    }
                });
            }
        });
}

function deleteAdvanceType(uri){
    //var result = confirm("Want to delete?");
    Swal.fire({
            title: 'Are you sure you want to Delete?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete',
            }).then((result) => {
            if (result.value)
            {
                $.ajax({
                    url:   uri ,
                    type: 'DELETE',

                    success: function(result) {
                       if(result.status){
                             location.reload();
                        }

                    }
                });
            }
        });
}
