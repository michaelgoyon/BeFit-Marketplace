<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/nutrition_styles.css') ?>">
    <script defer src="https://widget-js.cometchat.io/v3/cometchatwidget.js"></script>
    <title>BeFit Nutrition</title>
</head>

<body>
    <div class="container">
        <h1 id="header">NUTRITIONAL HEALTH</h1>
        <div class="containbox">
            <a href="#weightloss">
                <div class="nutritionheader">Foods for Weight Loss</div>
            </a>
            <a href="#macros">
                <div class="nutritionheader">Count your Macros</div>
            </a>
            <a href="#exercise">
                <div class="nutritionheader">Benefits of Exercise</div>
            </a>
        </div>
        <h2 id="border"></h2>
        <div class="infodiv" id="weightloss">
            <img class="infoimg" src="<?php echo base_url('assets/images/weightlossfood.jpg') ?>">
            <p class="infohead">Foods for Weight Loss</p>
            <p class="infotext">
            A healthy weight is an important element of good health. How much you eat—and what you eat—play central roles in maintaining a healthy weight or losing weight. Exercise is the other key actor.
            For years, low-fat diets were thought to be the best way to lose weight. A growing body of evidence shows that low-fat diets often don't work, in part because these diets often replace fat with easily digested carbohydrates.
            Hundreds of diets have been created, many promising fast and permanent weight loss. Remember the cabbage soup diet? The grapefruit diet? How about the Hollywood 48 Hour Miracle diet, the caveman diet, the Subway diet, the apple cider vinegar diet, and a host of forgettable celebrity diets?
            The best diet for losing weight is one that is good for all parts of your body, from your brain to your toes, and not just for your waistline. It is also one you can live with for a long time. In other words, a diet that offers plenty of good tasting and healthy choices, banishes few foods, and doesn't require an extensive and expensive list of groceries or supplements.
            Several servings of fruits and vegetables a day,
            whole-grain breads and cereals,
            healthy fats from nuts, seeds, and olive oil.
            Source of lean protein from poultry, fish, and beans
            and limited amounts of red meat,
            moderate wine consumption with meals.
            </p>
        </div>
        <div class="infodiv" id="macros">
            <img class="infoimg" src="<?php echo base_url('assets/images/macrosfood.jpg') ?>">
            <p class="infohead">Count your Macros</p>
            <p class="infotext">
            Macronutrients, or “macros,” are proteins, fats, and carbohydrates. They are essential nutrients that provide energy and help keep people healthy. It is necessary to combine these nutrients in a diet to maintain a person’s health and normal bodily function.
            Counting macros can appear overwhelming or complicated. However, there are several steps that people can follow to start counting the macros they need. Each person’s daily calorie needs depends on several factors, including
            the age of the individual, the weight of the individual,a person’s sex assigned at birth and how active an individual is. After determining how many calories they require per day, people may wish to tailor their diets to include the correct amount of macronutrients.
            A 2020 study suggests that typical macronutrient percentages are as follows:10–30% as protein, 25–35% as fat, and 45–65% as carbohydrates. A person may find that certain ratios of macronutrients are more beneficial than others, depending on their caloric needs, body composition goals, and any health conditions they may have.
           
            </p>
        </div>
        <div class="infodiv" id="exercise">
            <img class="infoimg" src="<?php echo base_url('assets/images/exercise.jpg') ?>">
            <p class="infohead">Benefits of Daily Exercise</p>
            <p class="infotext">
            Exercise is defined as any movement that makes your muscles work and requires your body to burn calories. There are many types of physical activity, including swimming, running, jogging, walking, and dancing, to name a few.
            Being active has been shown to have many health benefits, both physically and mentally. It may even help you live longer. Exercise has been shown to improve your mood and decrease feelings of depression, anxiety, and stress
            It produces changes in the parts of the brain that regulate stress and anxiety. It can also increase brain sensitivity for the hormones serotonin and norepinephrine, which relieve feelings of depression.
            Additionally, exercise can increase the production of endorphins, which are known to help produce positive feelings and reduce the perception of pain. Some studies have shown that inactivity is a major factor in weight gain and obesity (6Trusted Source, 7Trusted Source).
            To understand the effect of exercise on weight reduction, it is important to understand the relationship between exercise and energy expenditure. Exercise plays a vital role in building and maintaining strong muscles and bones.
            Activities like weightlifting can stimulate muscle building when paired with adequate protein intake.
            This is because exercise helps release hormones that promote the ability of your muscles to absorb amino acids. This helps them grow and reduces their breakdown.
        </div>
    </div>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        CometChatWidget.init({
            "appID": "192441c86ab4e6a7",
            "appRegion": "us",
            "authKey": "bd9d02296028b3c8ce6791864495cdee3f43007a"
        }).then(response => {
            console.log("Initialization completed successfully");
            CometChatWidget.login({
                "uid": "<?php echo $this->session->userdata('userusername'); ?>"
            }).then(response => {
                CometChatWidget.launch({
                    "widgetID": "8116fe55-3361-44c1-bb27-c0e5e54d7954",
                    "docked": "true",
					"alignment": "right", //left or right
                    "roundedCorners": "true",
                    "height": "600px",
                    "width": "800px",
                    "defaultID": '<?php echo $this->session->userdata('userusername'); ?>', //default UID (user) or GUID (group) to show,
                    "defaultType": 'user' //user or group
                });
            }, error => {
                console.log("User login failed with error:", error);
                //Check the reason for error and take appropriate action.
            });
        }, error => {
            console.log("Initialization failed with error:", error);
            //Check the reason for error and take appropriate action.
        });
    });
</script>
</body>

</html>     