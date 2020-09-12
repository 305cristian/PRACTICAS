/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$(document).ready(function () {
 
    function validarCamposVaciosMat() {
        if ($('#txtMateria').val().length > 0) {
            return true;
        }
    }

    
    function validarCamposVacios() {
    if (($('#nombre').val().length > 0)
            && ($('#apellido').val().length > 0)
            && ($('#cedula').val().length > 0)
            && ($('#telefono').val().length > 0)) {
        return true;
    }

}



//});






