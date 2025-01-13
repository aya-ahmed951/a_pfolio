<?php
// الاتصال بقاعدة البيانات
require_once('conn.php');

// التحقق من وجود البيانات في النموذج
if (isset($_POST['clientName'], $_POST['clientProfession'], $_POST['clientTestimonial'])) {
    $clientName = $_POST['clientName'];
    $clientProfession = $_POST['clientProfession'];
    $clientTestimonial = $_POST['clientTestimonial'];

    // معالجة صورة العميل
    $clientImage = '';
    if (isset($_FILES['clientImage']) && $_FILES['clientImage']['error'] == 0) {
        $imageTmp = $_FILES['clientImage']['tmp_name'];
        $imageName = $_FILES['clientImage']['name'];
        $imagePath = 'uploads/' . $imageName;

        // نقل الصورة إلى المجلد
        move_uploaded_file($imageTmp, $imagePath);

        // تعيين اسم الصورة في قاعدة البيانات
        $clientImage = $imagePath;
    }

    // استعلام لإدخال البيانات في قاعدة البيانات
    $sql = "INSERT INTO testimonials (client_name, profession, testimonial, image) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $clientName, $clientProfession, $clientTestimonial, $clientImage);

    if ($stmt->execute()) {
        echo "Testimonial submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
} else {
    echo "All fields are required.";
}
?>
