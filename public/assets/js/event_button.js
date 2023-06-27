//EVENT HANDLE BUTTON VISI MISI
$.getJSON(base_url + '/info.json', function (res){
  return visiMisi = {
    visi: res.visi,
    misi: res.misi
  }
})

// const visiMisi = {
//   visi: `
  
//   `,
//   misi: `
//   <ol>
//     <li>Membangun hubungan yang harmonis dengan seluruh Civitas Akademika Politeknik Hasnur dengan tetap berprinsip pada lndependensi Mahasiswa.</li>
//     <li>Menciptakan HIMA Tl POLIHASNUR sebagai wadah yang lebih representatif dalam mengakomodasi aspirasi seluruh anggotanya.</li>
//     <li>Mewujudkan HIMA Tl POLIHASNUR yang aktif, profesional don solid serta mau bekerja sama untuk mencapai organisasi mahasiswa yang bersinergi.</li>
//     <li>Memperluas relasi dengan mengoptimalkan kegiatan yang berhubungan dengan masyarakat.</li>
//     <li>Meningkatkan potensi mahasiswa Teknik lnformatika di bidang akademik maupun non akademik yang unggul, kompeten, beretika, serta berbudi pekerti luhur.</li>
//   </ol>
//   `
// };
const visiBtn = $('#visi-btn');
const misiBtn = $('#misi-btn');

visiBtn.on('click', () => {

  const dataClick1 = visiBtn.data('click');

  if (dataClick1 == 'off') {
    misiBtn.data('click', 'off');
    misiBtn.toggleClass('btn-primary');
    misiBtn.toggleClass('btn-light');

    visiBtn.data('click', 'on');
    visiBtn.toggleClass('btn-light');
    visiBtn.toggleClass('btn-primary');

    $('#visi-misi-layout').fadeOut();
    setTimeout(() => {
      $('#visi-misi-layout').html(visiMisi.visi);
    }, 320);
    $('#visi-misi-layout').fadeIn();
  }
});

misiBtn.on('click', () => {

  const dataClick2 = misiBtn.data('click');

  if (dataClick2 == 'off') {
    visiBtn.data('click', 'off');
    visiBtn.toggleClass('btn-primary');
    visiBtn.toggleClass('btn-light');

    misiBtn.data('click', 'on');
    misiBtn.toggleClass('btn-light');
    misiBtn.toggleClass('btn-primary');

    $('#visi-misi-layout').fadeOut();
    setTimeout(() => {
      $('#visi-misi-layout').html(visiMisi.misi);
    }, 330);
    $('#visi-misi-layout').fadeIn();
  }
});

//event tombol close modal
$('#modal_pengurus').on('click', (e) => {
  if (e.target.getAttribute('class') == 'close') {
    $('#modal_pengurus').html('');
  }
})
