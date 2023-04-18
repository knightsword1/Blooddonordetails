<?php
session_start();
require 'dbcon.php';

if (isset($_POST['delete_donor'])) {
    $donor_id_no = mysqli_real_escape_string($con, $_POST['delete_donor']);

    $query = "DELETE FROM donor WHERE id_no='$donor_id_no' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Donor Deleted Successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Donor Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if (isset($_POST['update_donor'])) {
    $donor_id_no = mysqli_real_escape_string($con, $_POST['donor_id_no']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $blood_group = mysqli_real_escape_string($con, $_POST['blood_group']);
    $pincode = mysqli_real_escape_string($con, $_POST['pincode']);

    $query = "UPDATE donor SET name='$name', phone='$phone',email='$email', blood_group='$blood_group', pincode = '$pincode' WHERE id_no='$donor_id_no' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Donor Updated Successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Donor Not Updated";
        header("Location: index.php");
        exit(0);
    }
}


if (isset($_POST['save_donor'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $blood_group = mysqli_real_escape_string($con, $_POST['blood_group']);
    $pincode = mysqli_real_escape_string($con, $_POST['pincode']);

    $query = "INSERT INTO donor (name,phone,email,blood_group,pincode) VALUES ('$name','$phone','$email','$blood_group','$pincode')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = "Donor Created Successfully";
        header("Location: donor-create.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Donor Not Created";
        header("Location: donor-create.php");
        exit(0);
    }
}

