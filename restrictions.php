<?php require_once('config.php'); ?>
<!-- TCSS 445 : Spring 2024 -->
<!-- Assignment 4 Template -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Appetite Assemblers</title>
        <!-- add a reference to the external stylesheet -->
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="style.css">


    </head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
    </script>

    <body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Appetite Assemblers</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="recipes.php">Recipes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Diets + Lifestyles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="authors.php">Authors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                </ul>
                <form class="d-flex" action="search.php" method="get">
                    <input class="form-control me-sm-2" type="search" name="s" placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
                <button class="btn btn-dark my-2 my-sm-0" onclick="window.location.href = 'upload.php';">Upload</button>
            </div>
        </div>
    </nav>
        <div class="info-section">
            <div class="info-content">
                <h1 class="info-title">Understanding Dietary Restrictions</h1>
                <p class="info-text">
                    Welcome to our "Diets + Lifestyle" section, where we delve into the world of dietary restrictions to help you navigate and enjoy a diverse range of culinary experiences tailored to meet specific nutritional needs. Whether by choice or necessity, many people follow diets that restrict certain foods or ingredients. These restrictions can be due to various reasons, including health conditions, ethical beliefs, environmental concerns, or religious practices.
                </p>
            </div>
        </div>
        <div class="info1-section">
            <div class="info1-content">
                <h1 class="info1-title">Why Are Dietary Restrictions Important?</h1>
                <p class="info1-text">
                <ol>
                    <li><strong>Health and Wellness: </strong>For many, dietary restrictions are crucial for managing health conditions such as allergies, diabetes, celiac disease, or lactose intolerance. Avoiding specific foods can alleviate symptoms, prevent serious health issues, and improve overall well-being.</li>
                    <li><strong>Ethical and Environmental Concerns: </strong>Ethical beliefs often influence diet choices, such as veganism or vegetarianism, where individuals avoid animal products to promote animal welfare and reduce environmental impact. Understanding these choices can foster respect and inclusivity in our dietary habits.</li>
                    <li><strong>Cultural and Religious Practices: </strong>Dietary restrictions are often rooted in cultural traditions and religious beliefs. Observing these practices can be a significant aspect of one’s identity and community involvement.</li>
                    <li><strong>Personal Well-being and Lifestyle Choices: </strong>Many choose specific diets to align with their personal wellness goals, such as weight management or improving physical fitness. These lifestyle choices can lead to more mindful and health-conscious eating habits.</li>
                </ol>
                At AppetiteAssemblers, we believe that understanding and respecting dietary restrictions is key to creating inclusive, delicious, and nourishing culinary experiences. Whether you're here to find new recipes that cater to your diet, learn about different dietary practices, or simply explore the rich world of food, we’re here to provide you with all the resources you need to make informed and delightful dietary choices.
            </div>
        </div>
        <div class="container-fluid">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="vegetarian-tab" data-bs-toggle="tab" data-bs-target="#vegetarian" type="button" role="tab" aria-controls="vegetarian" aria-selected="false">Vegetarian</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="vegan-tab" data-bs-toggle="tab" data-bs-target="#vegan" type="button" role="tab" aria-controls="vegan" aria-selected="false">Vegan</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="dairy-free-tab" data-bs-toggle="tab" data-bs-target="#dairy-free" type="button" role="tab" aria-controls="dairy-free" aria-selected="false">Dairy-Free</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="gluten-free-tab" data-bs-toggle="tab" data-bs-target="#gluten-free" type="button" role="tab" aria-controls="gluten-free" aria-selected="false">Gluten-Free</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="low-carb-tab" data-bs-toggle="tab" data-bs-target="#low-carb" type="button" role="tab" aria-controls="low-carb" aria-selected="false">Low-Carb</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="vegetarian" role="tabpanel" aria-labelledby="vegetarian-tab">
                    <p><strong>What is a Vegetarian Diet?</strong></p>
                    <p>
                        A vegetarian diet involves abstaining from eating meat, poultry, and fish. Vegetarians often base their meals around a variety of plant-based foods including vegetables, fruits, grains, legumes, nuts, and seeds. There are several types of vegetarian diets, including:
                    </p>
                    <ol>
                        <strong>Lacto-vegetarian:</strong> Includes dairy products but excludes meat, fish, poultry, and eggs.
                    </ol>
                    <ol>
                        <strong>Ovo-vegetarian: </strong>Includes eggs but excludes meat, fish, poultry, and dairy.
                    </ol>
                    <ol>
                        <strong>Lacto-ovo vegetarian:</strong> Includes both eggs and dairy products but excludes meat, fish, and poultry.
                    </ol>
                    <p>
                       <strong>Health Benefits</strong>
                        <br><br>Adopting a vegetarian diet can offer numerous health benefits, including:
                    </p>
                    <ol>
                        <strong>Reduced risk of chronic diseases: </strong>Studies show that vegetarians tend to have a lower risk of heart disease, hypertension, type 2 diabetes, and certain types of cancer
                    </ol>
                    <ol>
                        <strong>Weight Management: </strong>A plant-based diet can help in maintaining a healthy weight due to lower intake of saturated fats and higher amounts of dietary fiber.
                    </ol>
                    <ol>
                        <strong>Improved Digestion: </strong>High fiber content from fruits, vegetables, and whole grains promotes better gut health and digestion.
                    </ol>
                    <p>
                        <strong>Nutritional Considerations</strong>
                        <br><br>While a vegetarian diet can be nutritionally sufficient, it requires careful planning to avoid potential deficiencies in nutrients typically obtained from animal products:
                    </p>
                    <ol>
                        <strong>Protein: </strong>Ensure adequate protein intake by consuming a variety of plant-based sources such as legumes, nuts, seeds, and whole grains.
                    </ol>
                    <ol>
                        <strong>Iron: </strong>Plant-based iron sources include lentils, chickpeas, fortified cereals, and dark leafy greens. Consuming these with vitamin C-rich foods can enhance iron absorption.
                    </ol>
                    <ol>
                        <strong>Vitamin B12: </strong>Since B12 is primarily found in animal products, vegetarians may need fortified foods or supplements.
                    </ol>
                    <ol>
                        <strong>Calcium and Vitamin D: </strong>Include fortified plant milks and juices, and consider supplementing especially if dairy consumption is limited.

                    </ol>
                    <p>
                        Explore our collection of vegetarian recipes that showcase how diverse and flavorful vegetarian cooking can be.
                        <br><br>
                        Whether for health reasons, ethical considerations, or environmental concerns, a vegetarian diet can be a fulfilling and nutritious way of eating. With proper planning and a bit of culinary creativity, it can provide all the necessary nutrients required for a healthy lifestyle.
                    </p>
                </div>
                <div class="tab-pane fade" id="vegan" role="tabpanel" aria-labelledby="vegan-tab">
                    <p><strong>What is a Vegan Diet?</strong></p>
                    <p>
                        A vegan diet is one that excludes all animal products and by-products. This includes meat, dairy, eggs, and often other substances derived from animals such as gelatin and honey. Vegans adopt this diet for various reasons, including ethical beliefs, health considerations, and environmental concerns.
                    </p>
                    <p>
                        <strong>Health Benefits</strong>
                        <br><br>Following a vegan diet can offer several health advantages, such as:
                    </p>
                    <ol>
                        <strong>Reduced risk of chronic diseases: </strong>Vegans often experience lower rates of heart diseases, high blood pressure, type 2 diabetes, and certain types of cancer.
                    </ol>
                    <ol>
                        <strong>Weight Management: </strong>A plant-based diet tends to be lower in calories and fat, helping with weight management and obesity prevention.
                    </ol>
                    <ol>
                        <strong>Improved Digestion: </strong>High fiber content from fruits, vegetables, and whole grains promotes better gut health and digestion.
                    </ol>
                    <p>
                        <strong>Nutritional Considerations</strong>
                        <br><br>To ensure nutritional adequacy, vegans should pay attention to certain nutrients typically obtained from animal sources:
                    </p>
                    <ol>
                        <strong>Protein: </strong>A variety of plant-based proteins should be included, such as beans, lentils, tofu, and quinoa.
                    </ol>
                    <ol>
                        <strong>Iron: </strong>Plant sources of iron include legumes, fortified cereals, and leafy greens. Consuming these with vitamin C-rich foods can enhance iron absorption.
                    </ol>
                    <ol>
                        <strong>Vitamin B12: </strong>This is a critical nutrient not naturally available in plant foods. Vegans should use fortified foods or a B12 supplement.
                    </ol>
                    <ol>
                        <strong>Calcium and Vitamin D: </strong>These can be obtained from fortified plant milks and juices, or supplements may be necessary.
                    </ol>
                    <p>
                        Discover our curated selection of vegan recipes that prove that plant-based eating doesn't have to sacrifice flavor or variety. 
                        <br><br>
                        Choosing a vegan lifestyle is a profound way to express care for animal welfare, the environment, and personal health. With the right planning and knowledge, a vegan diet can be both nutritionally complete and immensely satisfying.
                    </p>
                </div>
                <div class="tab-pane fade" id="dairy-free" role="tabpanel" aria-labelledby="dairy-free-tab">
                    <p><strong>What is a Dairy-Free Diet?</strong></p>
                    <p>
                        A dairy-free diet excludes all dairy products, including milk, cheese, yogurt, butter, and cream. This diet is often adopted by individuals who are lactose intolerant, allergic to dairy proteins, or following vegan diets. Others may choose to eliminate dairy for skin health or as part of an anti-inflammatory eating plan.
                        <br><br>
                        <strong>Reasons for Going Dairy-Free</strong>
                    </p>
                    <ol>
                        <strong>Lactose Intolerance: </strong>Many people lack the enzyme lactase, which is necessary for digesting lactose, the sugar found in milk. Consuming dairy can lead to digestive distress for these individuals.
                    </ol>
                    <ol>
                        <strong>Milk Allergy: </strong>This is an immune reaction to one or more of the proteins present in milk, which can cause symptoms ranging from skin reactions and digestive issues to severe respiratory problems.
                    </ol>
                    <ol>
                        <strong>Ethical and Environment Concerns: </strong>Similar to vegans, some people avoid dairy due to concerns about animal welfare or the environmental impact of dairy farming.
                    </ol>
                    <ol>
                        <strong>Health Considerations: </strong>Some choose to eliminate dairy for potential benefits like reduced inflammation, improved complexion, or better management of certain health conditions.
                    </ol>
                    <p>
                        <strong>Health Benefits</strong>
                        <br><br>Eliminating dairy can lead to various health benefits, particularly for those with lactose intolerance or milk allergies:
                    </p>
                    <ol>
                        <strong>Improved Digestion: </strong>Avoiding dairy can alleviate symptoms like bloating, gas, diarrhea, and abdominal pain.
                    </ol>
                    <ol>
                        <strong>Better Sking Health: </strong>Some studies suggest a link between dairy consumption and acne; thus, cutting out dairy might improve skin clarity.
                    </ol>
                    <ol>
                        <strong>Potential Reduction in Chronic Inflammation: </strong>Dairy is considered pro-inflammatory for some people, and removing it from the diet can help manage chronic inflammatory conditions.
                    </ol>
                    <p>
                        <strong>Nutritional Considerations</strong>
                        <br><br>When eliminating dairy, it’s important to ensure adequate intake of nutrients commonly found in dairy products:
                    </p>
                    <ol>
                        <strong>Protein: </strong>Dairy products are a key protein source for many; alternatives include plant-based milks, legumes, nuts, and seeds.
                    </ol>
                    <ol>
                        <strong>Calcium: </strong>Essential for bone health, calcium can be found in fortified plant milks, leafy green vegetables, and calcium-set tofu.
                    </ol>
                    <ol>
                        <strong>Vitamin D: </strong>Often added to dairy products, vitamin D is also available through fortified foods, supplements, and adequate sunlight exposure.

                    </ol>
                    <p>
                        Explore our collection of dairy-free recipes that deliver all the taste and satisfaction without the dairy.
                        <br><br>
                        Adopting a dairy-free diet can be a healthy and ethical choice that benefits your digestive system, skin, and overall inflammation levels. With a variety of plant-based alternatives available, maintaining a balanced and nutritious diet without dairy is more accessible than ever.
                    </p>
                </div>
                <div class="tab-pane fade" id="gluten-free" role="tabpanel" aria-labelledby="gluten-free-tab">
                    <p><strong>What is a Gluten-Free Diet?</strong></p>
                    <p>
                        A gluten-free diet involves avoiding all foods that contain gluten, a protein found in wheat, barley, rye, and triticale. This diet is essential for individuals with celiac disease, gluten sensitivity, or wheat allergy, and is also adopted by those looking to reduce gastrointestinal discomfort or other symptoms associated with gluten.
                        <br><br>
                        <strong>Reasons for Going Gluten-Free</strong>
                    </p>
                    <ol>
                        <strong>Celiac Disease: </strong>An autoimmune disorder where ingestion of gluten leads to damage in the small intestine.
                    </ol>
                    <ol>
                        <strong>Non-Celiac Gluten Sensitivity: </strong>Causes symptoms similar to celiac disease but without the intestinal damage.
                    </ol>
                    <ol>
                        <strong>Wheat Allergy: </strong>An allergic reaction to proteins found in wheat, including gluten.
                    </ol>
                    <ol>
                        <strong>Digestive Comfort: </strong>Some people choose a gluten-free diet to alleviate bloating, gas, or other digestive issues they attribute to gluten-containing foods.
                    </ol>
                    <p>
                        <strong>Health Benefits</strong>
                        <br><br>Following a gluten-free diet can have several benefits, particularly for those with gluten-related disorders:
                    </p>
                    <ol>
                        <strong>Symptom Relief: </strong>For those with celiac disease or gluten sensitivity, eliminating gluten can significantly reduce symptoms like diarrhea, abdominal pain, and bloating.
                    </ol>
                    <ol>
                        <strong>Reduced Inflammation: </strong>People with gluten-related disorders may experience reduced chronic inflammation and improved overall health when they remove gluten from their diet.
                    </ol>
                    <ol>
                        <strong>Increased Energy: </strong>Gluten intolerance can lead to fatigue; thus, a gluten-free diet might improve energy levels.
                    </ol>
                    <p>
                        <strong>Nutritional Considerations</strong>
                        <br><br>Adopting a gluten-free diet requires careful planning to avoid nutritional deficiencies commonly associated with wheat and other gluten-containing grains:
                    </p>
                    <ol>
                        <strong>Fiber: </strong>Gluten-free grains like quinoa, rice, and millet can help maintain adequate fiber intake.
                    </ol>
                    <ol>
                        <strong>Iron and B Vitamins: </strong>Gluten-free eaters should include rich sources of these nutrients, such as leafy greens, beans, and fortified products.
                    </ol>
                    <ol>
                        <strong>Whole Grains: </strong>Choosing whole gluten-free grains ensures that the diet remains rich in nutrients and not overly reliant on processed gluten-free products
                    </ol>
                    <p>
                        Discover a range of gluten-free recipes on our site, designed to cater to those avoiding gluten without compromising on taste.
                        <br><br>
                        Whether for medical reasons or personal preference, a gluten-free diet can be a healthful and rewarding way of eating. By focusing on naturally gluten-free foods and making informed choices about gluten-free products, individuals can enjoy a diverse and nutritious diet.
                    </p>
                </div>
                <div class="tab-pane fade" id="low-carb" role="tabpanel" aria-labelledby="low-carb-tab">
                    <p><strong>What is a Low-Carb Diet?</strong></p>
                    <p>
                        A low-carb diet focuses on reducing carbohydrate intake, typically emphasizing higher protein and fat consumption, and relying on vegetables and other low-carb foods as primary energy sources. This diet varies in the degree of carbohydrate restriction, with some versions drastically reducing carbs, while others allow a moderate amount.
                        <br><br>
                        <strong>Reasons for Going Low-Carb</strong>
                    </p>
                    <ol>
                        <strong>Weight Management: </strong>Low-carb diets are popular for weight loss, as reducing carbs can lead to a natural reduction in appetite and caloric intake.
                    </ol>
                    <ol>
                        <strong>Blood Sugar Control: </strong>This diet can be particularly beneficial for people with diabetes or insulin resistance, as it helps manage blood sugar levels.
                    </ol>
                    <ol>
                        <strong>Heart Health: </strong>Some studies suggest that low-carb diets can improve heart health markers, including reducing bad LDL cholesterol and triglycerides.
                    </ol>
                    <p>
                        <strong>Health Benefits</strong>
                        <br><br>Adopting a low-carb diet can offer several health advantages:
                    </p>
                    <ol>
                        <strong>Enhance Weight Loss: </strong>By limiting carbs, the body begins to burn stored fat for energy, leading to weight loss.
                    </ol>
                    <ol>
                        <strong>Improved Metabolic Health: </strong>Reducing carbohydrate intake can improve markers of metabolic syndrome, including blood pressure, blood sugars, and blood lipid levels.
                    </ol>
                    <ol>
                        <strong>Increased Satiety: </strong>High-protein and high-fat diets can increase feelings of fullness, which helps control hunger and decrease calorie intake.
                    </ol>
                    <p>
                        <strong>Nutritional Considerations</strong>
                        <br><br>While a low-carb diet has many benefits, it’s important to consider its nutritional balance:
                    </p>
                    <ol>
                        <strong>Fiber Intake: </strong>Since many high-carb foods are also high in fiber, choose high-fiber, low-carb options like leafy greens, broccoli, and berries to maintain digestive health.
                    </ol>
                    <ol>
                        <strong>Diverse Fat Source: </strong>Include healthy fats from sources like avocados, nuts, seeds, and olive oil to maintain heart health.
                    </ol>
                    <ol>
                        <strong>Adequate Protein: </strong>Ensure protein intake is from varied sources, providing all essential amino acids. Choices include meat, fish, eggs, and plant-based proteins like tofu.
                    </ol>
                    <p>
                        Explore our collection of delicious low-carb recipes designed to fit seamlessly into a low-carb lifestyle without sacrificing flavor.
                        <br><br>
                        A low-carb diet can be a powerful tool for improving overall health and achieving weight management goals. With careful planning and a focus on nutrient-rich foods, those following a low-carb diet can enjoy a diverse and balanced diet.
                    </p>
                </div>
            </div>
        </div>

    </body>
</html>