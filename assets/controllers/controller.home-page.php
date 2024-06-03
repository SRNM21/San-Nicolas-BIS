<?php 

$mission_en         = 'Attain sustainability growth and development through people empowerment, optimum utilization of land and resource, delivery of basic services, promotion of economic activities that are supportive to the development of commerce of the city of Pasig as well as the country, attained through participative and productive citizenry and ecologically sound environment. <br>A livable community of disciplined, law-abiding, productive and healthy individuals; a community that is gender responsive, spiritually, socially progressive; peaceful, drug-free, environmentally aware, self-sufficient and vigilant on the needs and problems of others anchored on a good governance and excellent public service.';
$mission_ta         = 'Makamit ang sustainability growth at development sa pamamagitan ng people empowerment, optimum utilization of land and resource, delivery of basic services, promotion of economic activities na sumusuporta sa pag-unlad ng commerce ng lungsod ng Pasig pati na rin ng bansa, na natatamo sa pamamagitan ng participative at productive na mamamayan. at ecologically sound na kapaligiran. <br>Isang matitirahan na komunidad ng mga disiplinado, masunurin sa batas, produktibo at malusog na mga indibidwal; isang komunidad na tumutugon sa kasarian, espirituwal, progresibong panlipunan; mapayapa, walang droga, kamalayan sa kapaligiran, makasarili at mapagmatyag sa mga pangangailangan at problema ng iba na nakaangkla sa mabuting pamamahala at mahusay na serbisyo publiko.';

$vision_en          = 'A liable community of disciplined, law-abiding, productive and healthy individuals; a community that is gender responsive spiritually, socially progressive; peaceful, drug-free, environmentally aware, self-sufficient and vigilant on the needs and problems of others, anchored on good governance and excellent public service.';
$vision_ta          = 'Isang mananagot na komunidad ng mga disiplinado, masunurin sa batas, produktibo at malusog na mga indibidwal; isang komunidad na tumutugon sa kasarian sa espirituwal, progresibong panlipunan; mapayapa, walang droga, kamalayan sa kapaligiran, makasarili at mapagbantay sa mga pangangailangan at problema ng iba, nakaangkla sa mabuting pamamahala at mahusay na serbisyo publiko.';

$about_main         = 'Empowered Citizens and Sustainable Community for All';
$about_title_1      = 'Collaborative Community';
$about_title_2      = 'Balanced Development';
$about_details_1    = 'Residents work together with the government to achieve shared goals, fostering a sense of ownership and participation.';
$about_details_2    = 'The barangay prioritizes economic growth that creates opportunities for all, while maintaining a clean and healthy environment for future generations.';

$brgy_off_into      = 'Introducing the team behind Barangay San Nicolas';

$officials = queryTable('barangay_officials', '');
$brgy_cap_img = 'default.jpg';
$brgy_cap_name = ' ';
$brgy_cap_position = ' ';
$brgy_cap_desc = ' ';

foreach ($officials as $official) 
{
    if ($official['position'] == 'Barangay Captain')
    {
        $fullname = $official['first_name'] . ' ' . $official['middle_name']. ' ' . $official['last_name'];
        $brgy_cap_img = $official['profile'];
        $brgy_cap_name = $fullname;
        $brgy_cap_position = 'Barangay Captain';
        $brgy_cap_desc = "Barangay San Nicolas is led by Kapitan $brgy_cap_name, a man as warm as the community itself. Known for his kindness, helpfulness, and a smile that lights up the room, Kapitan $brgy_cap_name is always there to lend a hand and ensure everyone feels welcome.";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    
    $id         = generateID('FED');
    $fb         = $_POST['feedback'];
    $is_anon    = isset($_POST['anonymous']);
    $name       = $is_anon ? 'Anonymous' : $_POST['name'];

    $barangayOfficialData = [
        'id'            => $id,
        'name'          => $name,
        'feedback'      => $_POST['feedback'],
    ];

    $add = addFeedback($barangayOfficialData);

    if ($add == 1)
    {
        $modal_icon     = 'success';
        $modal_title    = 'Feedback Sent';
        $modal_message  = 'Your feedback has been sent to our office';
        $modal_pos      = '-';
        $path           = 'home';

        require getPartial('admin.confirm-modal');
    }
    else 
    {
        echo $add;
    }
}

require getPublicView('home-page');