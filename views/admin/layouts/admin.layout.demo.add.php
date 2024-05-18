<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel='stylesheet' href=<?= getStyle('admin'); ?>>
</head>
<body>
    <main class='f-row'>
        <?php include getPartial('admin.side-menu'); ?>
        <form class='f-col demo' method="post">
            <div class='f-col'>
                family_head_id 
                <input type="text" name="family_head_id" id="family_head_id">
            </div>
            <div class='f-col'>
            date_of_interview <input type="date" name="date_of_interview" id="date_of_interview">
            </div>
            <div class='f-col'>
            purok <input type="text" name="purok" id="purok">
            </div>
            <div class='f-col'>
            last_name <input type="text" name="last_name" id="last_name">
            </div>
            <div class='f-col'>
            first_name <input type="text" name="first_name" id="first_name">
            </div>
            <div class='f-col'>
            middle_name <input type="text" name="middle_name" id="middle_name">
            </div>
            <div class='f-col'>
            address <input type="text" name="address" id="address">
            </div>
            <div class='f-col'>
            occupation <input type="text" name="occupation" id="occupation">
            </div>
            <div class='f-col'>
            educational <input type="text" name="educational" id="educational">
            </div>
            <div class='f-col'>
            contact_number <input type="text" name="contact_number" id="contact_number">
            </div>
            <div class='f-col'>
            email <input type="text" name="email" id="email">
            </div>
            <div class='f-col'>
            birthdate <input type="date" name="birthdate" id="birthdate">
            </div>
            <div class='f-col'>
            age <input type="text" name="age" id="age">
            </div>
            <div class='f-col'>
            civil_status <input type="text" name="civil_status" id="civil_status">
            </div>
            <div class='f-col'>
            <button type="submit">submit</button>
            <a href="/sannicolasbis/administrator/residence">back</a>
        </form>
    </main>

</body>
</html>