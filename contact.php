
<?php include('layouts/header.php'); ?>


    <!--Contact-->
      <div class="containerr my-5 py-5" id="featured">
        <form action="https://formspree.io/f/xjvngapk" method="POST" id="contact-box">
            <div class="left">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3961.007275693169!2d107.58675384521484!3d-6.889730930328369!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7344743074b%3A0xc9aeb973d8afe4df!2sDeden%20Siswanto!5e0!3m2!1sid!2sid!4v1706275575294!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
                <div class="right">
                        <h2>Contact Us</h2>
                        <input type="text" id="full-name" name="full-name" class="field" placeholder="Enter Your Name">
                        <input type="email" name="email" id="email" name="email" class="field" placeholder="Enter Your Email">
                        <input type="text" id="subject" name="subject" class="field" placeholder="Enter Your Subject">
                        <textarea type="text" id="message" name="message" placeholder="Message" class="field"></textarea>
                        <button type="submit" class="btnns">Send me message</button>
                </div>
        </form>
      </div>

<?php include('layouts/footer.php'); ?>
