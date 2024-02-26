document.addEventListener("DOMContentLoaded", function() {
    // تعريف المحتوى الخاص بال footer
    var footerContent = `
    <div class="footer-area section-space--ptb_80">
    <div class="container">
        <div class="row footer-widget-wrapper">
            <div class="col-lg-4 col-md-6 col-sm-6 footer-widget">
                <div class="footer-widget__logo mb-10">
                    <img src="../assets/images/logo/Arish_cement_Co._Logo_croped.png" width="70"
                        height="48" class="img-fluid" alt="">
                </div>
                <ul class="footer-widget__list">
                    <li>
                        <i class="fas fa-map-marker-alt location-icon"></i>

                مصر، القاهرة، القاهرة الجديدة<br>، التجمع الثالث، عمارة 192 جناح3
                    </li>
                    
                </ul>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 footer-widget">
                <h6 class="footer-widget__title mb-20">تواصل معنا</h6>
                <ul class="footer-widget__list">
                    <li>
                        <i class="fas fa-envelope contact-icon location-icon"></i>
                        <a href="mailto:sales@nmscement.com"
                            class="hover-style-link">sales@nmscement.com</a>
                    </li>
                    <li>
                        <i class="fas fa-phone contact-icon location-icon"></i>
                        <a href="tel:+2021808809" class="hover-style-link text-black ">+201069632570
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 footer-widget">
                <h6 class="footer-widget__title mb-20">روابط سريعة</h6>
                <ul class="footer-widget__list">
                    <li><a href="about-us.html" class="hover-style-link">
                            حولنا</a></li>
                    <li><a href="#features" class="hover-style-link">الميزات</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 footer-widget">
                <h6 class="footer-widget__title mb-20">موقعنا</h6>
                <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55277.179955197666!2d31.410892065429245!3d30.013216907947612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458229ee11726c3%3A0xfc153fdc67a8f109!2s192%2C%20New%20Cairo%201%2C%20Cairo%20Governorate%204735332!5e0!3m2!1sen!2seg!4v1708220231843!5m2!1sen!2seg"
                style="border:0; width: 90%;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
<div class="footer-copyright-area section-space--pb_30">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <span class="copyright-text">جميع الحقوق محفوظة <a href="https://hasthemes.com/">
                        &copy;NMS 2024
                        .</a></span>
            </div>
        </div>
    </div>
</div>
    `;

    // استهداف عنصر ال footer في الصفحة
    var footerElement = document.querySelector(".footer-area-wrapper");

    // إضافة المحتوى إلى عنصر ال footer
    footerElement.innerHTML = footerContent;
});