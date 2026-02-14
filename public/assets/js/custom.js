// $(document).ready(function (){
//     $('#select-all').click(function (){
//         if(this.checked){
//             $(':checkbox').each(function (){
//                 this.checked = true;
//             });
//         }else {
//             $(':checkbox').each(function (){
//                 this.checked = false;
//             });
//         }
//     });

//     $('#user_image').change(function(e){
//         var reader = new FileReader();
//         reader.onload = function(e){
//             $('#showUserImage').attr('src',e.target.result);
//         }
//         reader.readAsDataURL(e.target.files['0']);
//     });

//     $('#cat_banner_img').change(function(e){
//         var reader = new FileReader();
//         reader.onload = function(e){
//             $('#show_cat_bnner_img').attr('src',e.target.result);
//         }
//         reader.readAsDataURL(e.target.files['0']);
//     });

//     $('#page_banner').change(function(e){
//         var reader = new FileReader();
//         reader.onload = function(e){
//             $('#show_page_banner').attr('src',e.target.result);
//         }
//         reader.readAsDataURL(e.target.files['0']);
//     });
// });

// textarea issues solved 
// tinymce.init({
//     selector: '#elm1',
//     setup: function (editor) {
//         editor.on('change', function () {
//             tinymce.triggerSave();
//         });
//     },
// });

// $(document).ready(function() {
//     $('.select2').select2();
// });


 // owlCarousel functionality 

    $(document).ready(function() {
        var owl = $('.owl-carousel');
              owl.owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                  0: {
                    items: 1,
                    nav: false,
                  },
                  600: {
                    items: 2,
                    nav: false
                  },
                  1000: {
                    items: 3,
                    nav: false,
                    margin: 20
                  },
                  1400: {
                    items: 4,
                    nav: false,
                    margin: 20
                  }
                }
              });
              let isScrolling = false;

                owl.on('wheel DOMMouseScroll', '.owl-stage', function (e) {
                    e.preventDefault();
                    e.stopPropagation();

                    if (isScrolling) return;
                    isScrolling = true;

                    let oe = e.originalEvent;
                    let delta = oe.deltaY || -oe.detail;

                    if (delta > 0) {
                        owl.trigger('next.owl.carousel');
                    } else {
                        owl.trigger('prev.owl.carousel');
                    }

                    setTimeout(() => {
                        isScrolling = false;
                    }, 40); // match carousel speed
                });


            });


            // Bangla english toogle button 
    function bindLanguageToggle() {
        document.querySelectorAll('.btn-group').forEach(group => {
            const btnEnglish = group.querySelector('#btnEnglish');
            const btnBangla  = group.querySelector('#btnBangla');
            const card = group.closest('.card');
            const en = card.querySelector('#englishStory');
            const bn = card.querySelector('#banglaStory');

            const activeLang = card.dataset.activeLang || 'en';
            if (activeLang === 'en') {
                en.classList.remove('d-none');
                bn.classList.add('d-none');
                btnEnglish.classList.add('btn-dark');
                btnBangla.classList.remove('btn-dark');
            } else {
                bn.classList.remove('d-none');
                en.classList.add('d-none');
                btnBangla.classList.add('btn-dark');
                btnEnglish.classList.remove('btn-dark');
            }

            btnEnglish.onclick = () => {
                en.classList.remove('d-none');
                bn.classList.add('d-none');
                btnEnglish.classList.add('btn-dark');
                btnBangla.classList.remove('btn-dark');
                card.dataset.activeLang = 'en';
            };

            btnBangla.onclick = () => {
                bn.classList.remove('d-none');
                en.classList.add('d-none');
                btnBangla.classList.add('btn-dark');
                btnEnglish.classList.remove('btn-dark');
                card.dataset.activeLang = 'bn';
            };
        });
    }

    // Flip cards (unchanged)
    document.querySelectorAll('.scene-card').forEach(card => {
        card.addEventListener('click', function (e) {
            if (e.target.closest('a, button')) return;
            this.classList.toggle('is-flipped');
        });
    });

    // word details collapse btn
    document.querySelectorAll('.custom-collapse-icon').forEach(btn => {
        btn.addEventListener('click', function () {
            const icon = this.querySelector('i');
            icon.classList.toggle('ri-add-line');
            icon.classList.toggle('ri-subtract-line');
        });
    });



// Card download btn function 

function downloadSingleCard(btn) {
    const card = btn.closest('.export-card');
    if (!card) return;

    btn.disabled = true;
    btn.style.visibility = 'hidden';

    const titleEl = card.querySelector('h4');
    const fileName = titleEl
        ? titleEl.innerText.trim().replace(/\s+/g, '_')
        : 'word-card';

    // 🔹 Clone the card
    const clone = card.cloneNode(true);

    // 🔹 Position off-screen for canvas
    clone.style.position = "absolute";
    clone.style.left = "-9999px";
    clone.style.top = "0";
    clone.style.margin = "0";

    // 🔹 Premium mobile card styles
    clone.style.aspectRatio = "9 / 16";         // portrait mobile style
    clone.style.width = "400px";                // mobile card width
    clone.style.height = "350px";
    clone.style.padding = "20px";               // nice padding
    clone.style.borderRadius = "20px";          // smooth rounded corners
    clone.style.boxShadow = "0 10px 30px rgba(0,0,0,0.15), 0 4px 10px rgba(0,0,0,0.07)"; // subtle shadow               // dark text for readability


    document.body.appendChild(clone);

    html2canvas(clone, {
        scale: 3, // high resolution
        backgroundColor: null, // keep gradient visible
        useCORS: true
    }).then(canvas => {
        const link = document.createElement("a");
        link.href = canvas.toDataURL("image/png");
        link.download = fileName + ".png";
        link.click();
    }).finally(() => {
        document.body.removeChild(clone);
        btn.style.visibility = 'visible';
        btn.disabled = false;
    });
}





// Smoth scroll in card area 

const collapseEl = document.getElementById('word_list');
    const scrollBox  = document.getElementById('wordScroll');

// Before animation starts → hide scroll
    collapseEl.addEventListener('show.bs.collapse', function () {
        scrollBox.style.overflow = 'hidden';
    });

    // After animation completes → enable smooth scroll
    collapseEl.addEventListener('shown.bs.collapse', function () {
        scrollBox.style.overflowY = 'auto';
    });

    // When closing → remove scroll again (keeps closing smooth)
    collapseEl.addEventListener('hide.bs.collapse', function () {
        scrollBox.style.overflow = 'hidden';
    });