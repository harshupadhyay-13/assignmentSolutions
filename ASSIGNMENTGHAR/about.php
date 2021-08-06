<?php require 'includes\header.php';?>
<div class="slideshow-container">
<?php $count = new Review(1) ;
      $count = $count->ReviewCount();?>
  <div class="tableFixHead">
    <div class="mySlides" >
    <q style=" justify-content: center">AssignmentSolution is the final year project of CS students of Kalaniketan Polytecnic college jabalpur made under the guidance of Dharmendra Likhare Sir. It aims on smart learning via studing on modules instead of bulk study. It incorporates  Digital India. The idea credit goes to Aman Kushwaha and is implemented in harmony with Harsh vardhan Upadhyay and other admins. </q>
      <div><img src="/img/digitalindia.png" alt="digitalindia"> </div>
  
  </div>

    <div class="mySlides" style="height:inherit;">
      <h1 >Reviews by university students</h1>
      <?php for($i=1;$i<=$count["id"];$i++):
            $obj= new Review($i);
            $review=$obj->about;?>
      <q><?=$review["review"];?></q>
      <p class="author">- <?php echo $review["name"]; ?> </p>
      <p class="post"><?= $review["title"]; ?> </p><hr><br>
      <?php endfor;?>
    </div>

    <div class="mySlides"><i>
      <p class="mySlidesp">AssignmentSolution offers assignments to wide area of interest. At the moment we are covering eight branches including pharmacy. In them we have vivid variety of assignments categorized as Theory & Lab Assignments. Additionally we have Multiple Choice Question, Match the columns and Numerical Questions with each subject. These modules are prepared by senior students at university and verified by faculties.</p>
      <div><img src="/img/knpc.png" alt="kalaniketan polytechnic college"></i><br><hr><h1> KALANIKETAN POLYTECHNIC COLLEGE</h1><hr> </div> 
    </div>

    <div class="mySlides">
      <?php $obj = new Assignment();$suggestion = $obj->getSuggestion();
      //var_dump($suggestion);?>
      <p class="mySlidesp">Suggestions by our users:</p>
      <br><hr>
      <?php for($i=1;$i<=count($suggestion);$i++):?>
          <q><?=$suggestion[$i]["suggestion"];?></q>
          <p class="author">- <?php echo $suggestion[$i]["user"]; ?></p>
      <hr><br>
      <?php endfor;?>
      <p class="mySlidesp">
        AssignmentSolution makes a difference as it's access is only to admins and offer internship opportunity to students. Interested candidates can mail there application to harshupadhyay0213@gmail.com
      </p>
        
      </div>
    <div class="mySlides">
      <p class="mySlidesp">Development Contributions By:</p><hr>
      <ul>
        <li> Harsh Vardhan Upadhyay:
          <ul>
            <li>Database Architect</li>
            <li>Data Entry</li>
            <li>Lead Backend Developer</li>
          </ul>
        </li>
        <li>Aman Kushwaha:
          <ul>
            <li>CSS Text Effects</li>
            <li>Styling</li>
            <li>Lead Frontend Developer</li>
          </ul>
        </li>
        <li>Jatin Pathak:
          <ul>
            <li>Javascript Effects</li>
            <li>Data Entry</li>
            <li>Frontend Developer</li>
          </ul>
        </li>
        <li>Prashant Mishra:
          <ul>
            <li>Data Improvisation</li>
            <li>Team Motivator</li>
          </ul>
        </li>
      </ul>

    </div>

    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>
  </div>
  <div class="dot-container">
    <?php for($j=1;$j<=5;$j++):?>
    <span class="DOT" onclick="currentSlide(<?=$j?>)"></span> 
    <?php endfor;?> 
  </div>

</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n){
  showSlides(slideIndex += n);
}

function currentSlide(n){
  showSlides(slideIndex = n);
}

function showSlides(n){
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("DOT");

  if (n > slides.length){
    slideIndex = 1
    } 

  if (n < 1) {
    slideIndex = slides.length
    }
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }

  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }

  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
<?php require 'includes\footer.php';?>