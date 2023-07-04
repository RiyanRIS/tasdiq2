//TEMPLATE
const template = (id, img, nama, jabatan) => {
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
  url : base_url + '/api/struktur',
  type : 'GET',
  dataType : 'JSON',
  success : (result) => {
    // console.log(result)
    // const pengurus = result.pengurus;
    $.each(result, (index, data) => {
      let foto = base_url + '/uploads/struktur/' +data.file
      template('pengurus_inti', foto, data.nama, data.jabatan);
    })
  }
})
