//TEMPLATE
const template = (id, img, vid, nama, jabatan, nim, ttl, angkatan, namaPanggilan, quote, hobi) => {
  $('#'+id).append(`
  <div class="card m-3 shadow" style="width: 18rem;">
      <img src="${img}" style="width: 100%; class="card-img-top" loading="lazy" alt="${nama}_photo">
      <div class="card-body text-center">
       <h5 class="card-title">${nama}</h5>
       <h5 class="card-subtitle text-muted mb-2" style="font-size: .9em!important">${jabatan}</h5>
     </div>
 </div>
  `);
}

//AJAX 
$.ajax({
  url : 'info.json',
  type : 'GET',
  dataType : 'JSON',
  success : (result) => {
    const pengurus = result.pengurus;
    $.each(pengurus, (index, data) => {
      template('pengurus_inti', data.link_img, data.link_vid, data.nama, data.jabatan, data.nim, data.ttl, data.angkatan, data.nama_panggilan, data.quote, data.hobi);
    })
  }
})
