require('./bootstrap');
toastr = require('toastr');

let inputFile = document.getElementById('inputFile');
let addIcon = document.getElementById('addIcon');
let saveBtn = document.getElementById('saveBtn');
let avatarForm = document.getElementById('avatar-form');


addIcon.addEventListener('click', function () {
    inputFile.click();
    inputFile.addEventListener('change', function () {
        avatarForm.submit()
    });

});


