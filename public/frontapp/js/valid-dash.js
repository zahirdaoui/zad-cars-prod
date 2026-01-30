
/* functio for globale validate */
   /* ============ this is old function ================ */
/* function confirmDelet(elem , message , id_form){
  elem.addEventListener('click' , function(e){
    var conf = confirm(message);
     if(conf){
        document.getElementById(id_form).submit();
     }else{
         e.preventDefault();
     }
  });
} */
/* ===============this is new function ========= */
function confirmDelet(elem , message , id_form){
  elem.forEach((elem) => {
  elem.addEventListener('click' , function(e){
    var conf = confirm(message);
     if(conf){
        document.getElementById(id_form).submit();
     }else{
         e.preventDefault();
     }
  });
});
}

/* ====================================================== */


/* this for add cars to Trash  */
let btn_valid = document.querySelectorAll("#ConfirmDeletCar");
confirmDelet(btn_valid , 'L\'élément sera déplacé vers la corbeille!' ,'form_delete_cars');

/* ============================================================= */
/* thid for return cars from trach */

let destroy_cars = document.querySelectorAll('#destroy_cars');
confirmDelet( destroy_cars, 'L\'élément sera supprimé de la corbeille!!' ,'form_ds_cars');
/* 'formzahirdaoui' */
/* this for delete admin */
let destroy_admin = document.querySelectorAll('#delete-admin-from-dash');
confirmDelet( destroy_admin, 'L\'élément sélectionné sera supprimé !!' ,'delete-admin-form');
/* this for delete user  */
let destroy_user = document.querySelectorAll('#delete-user-from-dash');
confirmDelet( destroy_user, 'L\'élément sélectionné sera supprimé !!' ,'delete-user-form');









