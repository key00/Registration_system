<div class="card">
    <div class="card-body p-4">
        <h3 class="text-center card-title pb-4 mb-3">PERSONAL INFORMATIONS</h3>
        <div class="row info">
            <div class="col-5 col-md-5">
                <p>Name: <?php echo $fname ?></p>
                <p>Surname: <?php echo $lname ?></p>
                <p>Date of birth: <?php echo $dob ?></p>
                <p>Gender: <?php echo $gender ?></p>
                <p>Email: <?php echo $stdmail ?></p>


            </div>
            <div class="col-5 col-md-5">
                <p>Country of Origin: <?php echo $country ?></p>
                <p>Passport Number: <?php echo $pass_num ?></p>
                <p> Father's name: Niyungeko Deo </p>
                <p> Mother's name: Nsabimana Laetitia</p>
                <p>Tel: 05338857918</p>
            </div>
        </div>

    </div>
</div>

<div class="card mt-3">

    <div class="card-body p-4">
        <h3 class="text-center card-title pb-4 mb-3">ACADEMIC INFORMATIONS</h3>
        <p><i class="fa-solid fa-building-columns pe-3"></i>Faculty: Engineering</p>
        <p><i class="fa-solid fa-building pe-3"></i>Department: <?php echo $dep_name ?></p>
        <p><i class="fa-solid fa-inbox pe-3"></i>Status: <?php echo $status ?></p>
        <p><i class="fa-solid fa-graduation-cap pe-3"></i>Scholarship: <?php echo $scholarship ?>%</p>
        <p class="full_name"><i class="fa-solid fa-user-group pe-3"> </i>Advisor: <?php echo $advisor ?></p>
    </div>
</div>