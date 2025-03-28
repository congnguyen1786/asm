<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chào mừng bạn!</title>
</head>
<body style="font-family: Arial, sans-serif;">
    <div style="max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px;">
        <h2 style="color: #ff6600;">Chào mừng, <?php echo e($user->name); ?>!</h2>
        <p>Cảm ơn bạn đã đăng ký tài khoản tại <strong>FPT News</strong>.</p>
        <p>Chúng tôi rất vui khi có bạn đồng hành!</p>
        <p>Chúc bạn có trải nghiệm tuyệt vời!</p>
        <br>
        <p>Trân trọng,<br><strong>FPT News Team</strong></p>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\php31\Asignment_1_html\Asignment_1_html\resources\views/emails/welcome.blade.php ENDPATH**/ ?>