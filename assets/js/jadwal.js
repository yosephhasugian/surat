"use strict"
/* Description JADWAL Terminal
*
* @author Gunanto Simamora
* @email gunanto.simamora@gmail.com
* @link https://github.com/andtho89
* @link https://morait.dev
*/
var $data_berangkat = {data: []}
var $data_datang = {data: []}
$('#tgl').change(() => getJadwal());

$('#mymodal').on('hidden.bs.modal', function (e){
    $('.img-modal').attr('src', '');
  })
  $('.link-image').click(function(){
    var data = $(this).html();
    data = data.replace(' ', '');
    data = data.replace(/ /g, '_');
    data = `assets/img/bus/${data.toLowerCase()}.jpeg`
    $('.img-modal').attr('src', data)
    $('.modal').modal('show')
  })
function getJadwal(){
    var get = $.get(BASE_URL+'index.php/welcome/get_pis?date='+ $('#tgl').val());
    get.done(function(hasil){
        if(hasil){
        if (hasil.status){
            buildTable(hasil.data)
        }else{
            $data_berangkat = {data: []}
            $data_datang = {data: []}
        }
    }
    })
    get.fail(function(err){
        console.log(err)
    })
}

function buildTable(data){
    var berangkat = ''
    var datang = ''
    $.each(data, function(i, item){
        if (item.status == 'BERANGKAT'){
            $data_berangkat.data.push([item.tujuan, item.nopol, item.tanggal, item.jam, item.status, item.pintu])
            berangkat += `<tr><td>${item.nama_po}</td>
                    <td>${item.tujuan}</td>
                    <td>${item.nopol}</td>
                    <td>${item.tanggal}</td>
                    <td>${item.jam}</td>
                    <td>${item.status}</td>
                    <td>${item.gate}</td></tr>`
        }else{
            $data_datang.data.push([item.tujuan, item.nopol, item.tanggal, item.jam, item.status])
            datang += `<tr><td>${item.nama_po}</td>
            <td>${item.tujuan}</td>
            <td>${item.nopol}</td>
            <td>${item.tanggal}</td>
            <td>${item.jam}</td>
            <td>${item.status}</td>
           `
        }
    }) 
    $('#bodi-berangkat').html(berangkat);
    $('#table-berangkat').DataTable()
    $('#bodi-datang').html(datang);
    $('#table-datang').DataTable()
}
$(document).ready(function() {
    getJadwal()
})