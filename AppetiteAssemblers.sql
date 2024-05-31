USE appetiteassemblersdatabase;

--   Script: AppetiteAssemblersDB
--   Phase II

--  INGREDIENTS: Store data of ingredients that are able to be used in recipes.

-- ***************************
-- Part A
-- ***************************
CREATE TABLE INGREDIENTS( 
    Ingredient_name     VARCHAR(50)     NOT NULL, 
    Ingredient_price    DECIMAL(10, 2)  DEFAULT 0.00, 
    Ingredient_cat      VARCHAR(50), 
    PRIMARY KEY (Ingredient_name), 
    CONSTRAINT ChkIngredientPrice CHECK (Ingredient_price >= 0.00) 
);

--  RESTRICTIONS: Store data of restrictions such as allergies, diets, or lifestyles that may affect which ingredients are available.
CREATE TABLE RESTRICTIONS( 
    Restriction_id      INT             NOT NULL, 
    Restriction_name    VARCHAR(50)     NOT NULL, 
    PRIMARY KEY (Restriction_id) 
);

--  USERS: Stores data of users who are uploading, sharing, and rating recipes.
CREATE TABLE USERS( 
    User_id             INT             NOT NULL, 
    User_fname          VARCHAR(50)     NOT NULL, 
    User_lname          VARCHAR(50)     NOT NULL, 
    User_email          VARCHAR(255)    UNIQUE NOT NULL, 
    User_joindate       DATE            NOT NULL, 
    PRIMARY KEY (User_id) 
);

--  INGREDIENT_RESTRICTIONS: Stores data of what ingredients may be associated with certain restrictions.
CREATE TABLE INGREDIENT_RESTRICTIONS( 
    Ingredient_name     VARCHAR(50)     NOT NULL, 
    Restriction_id      INT             NOT NULL, 
    PRIMARY KEY (Ingredient_name, Restriction_id), 
    FOREIGN KEY (Ingredient_name) REFERENCES INGREDIENTS(Ingredient_name) 
        ON DELETE CASCADE 
        ON UPDATE CASCADE, 
    FOREIGN KEY (Restriction_id) REFERENCES RESTRICTIONS(Restriction_id) 
        ON DELETE CASCADE 
        ON UPDATE CASCADE 
);

--  RECIPES: Stores data of each recipe as well as details about the recipe.
CREATE TABLE RECIPES( 
    Recipe_id           INT             NOT NULL, 
    Recipe_name         VARCHAR(50)     NOT NULL, 
    Recipe_category     VARCHAR(50), 
    Recipe_price        DECIMAL(10,2)   DEFAULT 0.00 NOT NULL, 
    Recipe_author       INT            NOT NULL, 
    Recipe_rating       INT             DEFAULT 100 NOT NULL, 
    Recipe_mintocook    INT             DEFAULT 0 NOT NULL, 
    Recipe_uploaddate   DATE            NOT NULL, 
    PRIMARY KEY (Recipe_id), 
    CONSTRAINT CheckRecipePrice CHECK (Recipe_price  >= 0.00), 
    CONSTRAINT CheckRatingRange CHECK  (Recipe_rating  >= 0 AND Recipe_rating <= 100), 
    CONSTRAINT CheckMinToCook CHECK (Recipe_mintocook >= 0), 
    FOREIGN KEY (Recipe_author) REFERENCES USERS(User_id) 
        ON DELETE CASCADE 
        ON UPDATE CASCADE 
);

-- RECIPE_INGREDIENTS: Stores data of what ingredients are associated with each recipe.
CREATE TABLE RECIPE_INGREDIENTS( 
    Recipe_id           INT             NOT NULL, 
    Ingredient_name     VARCHAR(50)     NOT NULL, 
    PRIMARY  KEY (Recipe_id, Ingredient_name), 
    FOREIGN KEY (Recipe_id) REFERENCES RECIPES(Recipe_id) 
        ON DELETE CASCADE
        ON UPDATE CASCADE, 
    FOREIGN KEY (Ingredient_name) REFERENCES INGREDIENTS(Ingredient_name) 
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

--  USER_RATINGS: Stores data of ratings that users leave on recipes.
CREATE TABLE USER_RATINGS( 
    User_id             INT             NOT NULL, 
    Recipe_rating       INT             NOT NULL, 
    Recipe_id           INT             NOT NULL, 
    PRIMARY KEY (User_id, Recipe_id), 
    FOREIGN KEY (User_id) REFERENCES USERS(User_id) 
        ON DELETE CASCADE 
        ON UPDATE CASCADE, 
    FOREIGN KEY (Recipe_id)REFERENCES RECIPES(Recipe_id) 
        ON DELETE CASCADE 
        ON UPDATE CASCADE, 
    CONSTRAINT CheckUserRatingRange CHECK  (Recipe_rating  >= 0 AND Recipe_rating <= 100) 
);

-- ***************************
-- Part B
-- ***************************

-- Stores sample ingredient data
-- Summary: Store data about the ingredients, such as name, price, and category
INSERT INTO INGREDIENTS (Ingredient_name, Ingredient_price, Ingredient_cat) VALUES 
    ('Salmon', 12.99, 'Seafood'), 
    ('White Wine', 2.79, 'Beverage'), 
    ('Heavy Cream', 3.49, 'Dairy'), 
    ('Shallots', .30, 'Vegetable'), 
    ('Spinach', 2.29, 'Vegetable'), 
    ('Sun-Dried Tomatoes', 5.49, 'Canned Goods'), 
    ('Garlic', .67, 'Vegetable'), 
    ('Quinoa', 4.79, 'Grain'), 
    ('Greek Feta', 8.99, 'Dairy'), 
    ('Canned Organic Chickpeas', 1.25, 'Canned Goods'), 
    ('Red Onion', .60, 'Vegetable'), 
    ('Olive Oil', 9.99, 'Oil'), 
    ('Balsamic Vinegar', 3.79, 'Condiment'), 
    ('Smoked Paprika', 4.79, 'Spice'), 
    ('Baby Arugula', 5.99, 'Vegetable'), 
    ('Tomatoes', .39, 'Vegetable'), 
    ('Cucumbers', .89, 'Vegetable'), 
    ('Hummus', 3.99, 'Spread'), 
    ('Salt', .79, 'Seasoning'), 
    ('Sea Salt', 3.49, 'Seasoning'), 
    ('Ground Beef', 8.79, 'Meat'), 
    ('Eggs', 2.59, 'Dairy'), 
    ('Milk', 3.19, 'Dairy'), 
    ('Italian Seasoning', 1.50, 'Seasoning'), 
    ('Parsley', 1.29, 'Vegetable'), 
    ('Worcestershire Sauce', 1.49, 'Condiment'), 
    ('Quick Cooking Oats', 4.99, 'Grain'), 
    ('Ketchup', 3.99, 'Condiment'), 
    ('Black Pepper', 1.50, 'Seasoning'), 
    ('Onion', .40, 'Vegetable'), 
    ('Coconut Sugar', 5.29, 'Seasoning'), 
    ('Bananas', .25, 'Fruit'), 
    ('Almond Butter', 5.99, 'Spreads'), 
    ('Chocolate Chips', 2.99, 'Baking'), 
    ('Baking Powder', 2.69, 'Baking'), 
    ('Cacao Powder', 10.99, 'Baking'), 
    ('Italian Basil Leaves', 2.49, 'Vegetable'), 
    ('Unsalted Cashews', 7.49, 'Nuts'), 
    ('Cherry Tomatoes', 3.49, 'Vegetable'), 
    ('Oat Milk', 2.49, 'Dairy-Free'), 
    ('Nutritional Yeast', 5.99, 'Supplement'), 
    ('Pasta', 1.33, 'Grain'), 
    ('Lemon', .79, 'Vegetable'), 
    ('Canned Chickpeas', .89, 'Canned Goods'), 
    ('Breadcrumbs', 1.49, 'Grain'), 
    ('Italian Parsley', 1.29, 'Vegetable'), 
    ('Unsalted Butter', 4.39, 'Dairy'), 
    ('Dried Oregano', 1.50, 'Herb'), 
    ('Crushed Red Pepper Flakes', 5.49, 'Spice'), 
    ('Vegetable Broth', 1.49, 'Liquid'), 
    ('Parmesan', 5.99, 'Dairy'), 
    ('Vegan Butter', 6.99, 'Dairy-Free'), 
    ('Brown Sugar', 2.00, 'Seasoning'), 
    ('Vanilla Extract', 3.69, 'Baking'), 
    ('All-Purpose Flour', 2.69, 'Baking'), 
    ('Baking Soda', 1.19, 'Baking'), 
    ('Cinnamon', 4.49, 'Spice'), 
    ('Gluten-Free Bread Mix', 8.49, 'Grain'), 
    ('Instant Yeast', .76, 'Baking'), 
    ('Apple Cider Vinegar', 3.19, 'Vinegar'), 
    ('Corn Starch', 1.99, 'Starch'), 
    ('Cream Cheese', 3.49, 'Dairy'), 
    ('Powdered Sugar', 2.89, 'Baking'), 
    ('Vanilla Bean Paste', 8.99, 'Baking'), 
    ('Breakfast Sausage', 3.29, 'Meat'), 
    ('Bacon', 5.29, 'Meat'), 
    ('Ground Cumin', 3.99, 'Spice'), 
    ('Sweet Potato', 1.79, 'Vegetable'), 
    ('Paprika', 3.79, 'Seasoning'), 
    ('Garlic Powder', 1.50, 'Seasoning'), 
    ('Green Bell Pepper', .89, 'Vegetable'), 
    ('Shredded Cheese', 2.49, 'Dairy'), 
    ('Green Onion', .99, 'Vegetable'), 
    ('Taco Seasoning', .59, 'Seasoning'), 
    ('Romaine Lettuce', 2.99, 'Vegetable'), 
    ('Iceberg Lettuce', 1.89, 'Vegetable'), 
    ('Canned Black Beans', .89, 'Canned Goods'), 
    ('Avocado', .99, 'Vegetable'), 
    ('Salsa', 3.29, 'Condiment'), 
    ('Cilantro', .99, 'Vegetable'), 
    ('Tortilla Chips', 2.59, 'Grain'), 
    ('Lime', .69, 'Vegetable'), 
    ('Red Bell Pepper', 1.59, 'Vegetable'), 
    ('Chili Powder', 1.50, 'Spice'), 
    ('Canned Whole Peeled Tomatoes', 1.00, 'Canned Goods'), 
    ('Chicken Breast', 3.99, 'Poultry'), 
    ('Arrowroot Powder', 6.99, 'Starch'), 
    ('Lemon Pepper Seasoning', 1.50, 'Seasoning'), 
    ('Lemon Juice', 1.89, 'Liquid'), 
    ('Low-Sodium Chicken Broth', 1.49, 'Liquid'), 
    ('Kosher Salt', 3.69, 'Seasoning'),
    ('Granulated Sugar', 3.49, 'Seasoning'),
    ('Water', 1.39, 'Liquid'),
    ('Egg Whites', 6.49, 'Dairy');

-- Stores sample restrictions data
-- Summary: Store data about restrictions such as lifestlyes, diets, or allergies
    INSERT INTO RESTRICTIONS (Restriction_id, Restriction_name) VALUES 
    (1, 'Vegetarian'), 
    (2, 'Vegan'), 
    (3, 'Gluten-Free'), 
    (4, 'Low Carb'), 
    (5, 'Dairy-Free');

-- Stores sample user data
-- Summary: Store data about the users, such as names, emails, and join dates
    INSERT INTO USERS (User_id, User_fname, User_lname, User_email, User_joindate) VALUES 
    (101, 'Lisa', 'Bryan', 'bryanleeeesa@fakeemail.com', '2014-04-16'), 
    (102, 'Jenna', 'Barnard', 'jenna@butternutbakeryblog.com', '2018-01-05'), 
    (103, 'Sarah', 'Bond', 'sarah@liveeatlearn.com', '2014-11-13'), 
    (104, 'Minaëlle', 'Jerta', 'hello@minaelleskitchen.ca', '2021-11-12'), 
    (105, 'Margaret', 'Pahos', 'createcookshare@gmail.com', '2015-05-15'), 
    (106, 'Jamie', 'Vespa', 'dishingouthealth@gmail.com', '2013-02-19'), 
    (107, 'Hannah', 'Kling', 'hannah@lovelydelites.com', '2018-04-26');

-- Stores sample ingredient restriction data
-- Summary: Store data about the connections between ingredients and restrictions
INSERT INTO INGREDIENT_RESTRICTIONS (Ingredient_name, Restriction_id) VALUES 
    ('Salmon', 3),
    ('Salmon', 4),
    ('Spinach', 1),
    ('Spinach', 2),
    ('Spinach', 4),
    ('Sun-Dried Tomatoes', 1),
    ('Sun-Dried Tomatoes', 2),
    ('Quinoa', 1),
    ('Quinoa', 2),
    ('Quinoa', 3),
    ('Hummus', 1),
    ('Hummus', 2),
    ('Hummus', 3),
    ('Canned Organic Chickpeas', 1),
    ('Canned Organic Chickpeas', 2),
    ('Canned Organic Chickpeas', 3),
    ('Canned Organic Chickpeas', 5),
    ('Eggs', 1),
    ('Eggs', 4),
    ('Quick Cooking Oats', 1),
    ('Quick Cooking Oats', 2),
    ('Quick Cooking Oats', 3),
    ('Almond Butter', 3),
    ('Almond Butter', 5),
    ('Unsalted Cashews', 1),
    ('Unsalted Cashews', 2),
    ('Unsalted Cashews', 3),
    ('Oat Milk', 1),
    ('Oat Milk', 2),
    ('Oat Milk', 3),
    ('Nutritional Yeast', 1),
    ('Nutritional Yeast', 2),
    ('Nutritional Yeast', 3),
    ('Nutritional Yeast', 4),
    ('Nutritional Yeast', 5),
    ('Canned Chickpeas', 1),
    ('Canned Chickpeas', 2),
    ('Canned Chickpeas', 3),
    ('Canned Chickpeas', 5),
    ('Vegetable Broth', 1),
    ('Vegetable Broth', 2),
    ('Vegan Butter', 2),
    ('Gluten-Free Bread Mix', 3),
    ('Arrowroot Powder', 3);

-- Stores sample recipe data
-- Summary: Store data about the recipes, such as names, prices, categories, and more
INSERT INTO RECIPES (Recipe_id, Recipe_name, Recipe_category, Recipe_price, Recipe_author, Recipe_rating, Recipe_mintocook, Recipe_uploaddate) VALUES 
    (1001, 'Salad Jars with Chickpea, Quinoa, Feta, and Hummus', 'Lunch', 52.34, 105, DEFAULT, 25, '2024-03-04'), -- Gluten Free, Vegetarian
    (1002, 'Salmon Skillet with Sun-Dried Tomato Cream Sauce', 'Dinner', 36.46, 106, 100, 30, '2024-01-03'), -- Gluten Free
    (1003, 'Classic Meatloaf', 'Dinner', 46.02, 101, 98, 75, '2024-01-21'), -- Gluten Free
    (1004, 'Banana Brownies', 'Dessert', 28.70, 107, 77, 35, '2023-06-03'), -- Gluten Free, Dairy Free, Vegan, Vegetarian
    (1005, 'Basil Pesto Pasta', 'Dinner', 28.02, 104, DEFAULT, 17, '2023-08-06'), -- Dairy Free
    (1006, 'Chickpea Meatballs', 'Dinner', 14.16, 103, 100, 30, '2024-04-09'), -- Vegetarian, Dairy Free?
    (1007, 'Marry Me Chickpeas', 'Dinner', 35.07, 103, 99, 15, '2024-01-11'), -- Vegetarian
    (1008, 'Cinnamon Rolls', 'Dessert', 60.63, 102, 100, 120, '2023-03-15'), -- Gluten Free
    (1009, 'Ultimate Breakfast Casserole', 'Breakfast', 45.06, 101, 100, 85, '2023-11-26'), -- Low Carb
    (1010, 'Taco Salad', 'Lunch', 33.58, 101, 100, 25, '2024-04-08'), -- Low Carb
    (1011, 'Shakshuka', 'Breakfast', 29, 101, 99, 30, '2023-12-21'), -- Vegetarian
    (1012, 'Lemon Pepper Chicken', 'Dinner', 36.68, 101, 99, 15, '2024-02-04'); --

-- Stores sample recipe ingredient data
-- Summary: Store data about the connections between ingredients and recipes
INSERT INTO RECIPE_INGREDIENTS (Recipe_id, Ingredient_name) VALUES 
    (1001, 'Canned Organic Chickpeas'), 
    (1001, 'Red Onion'), 
    (1001, 'Smoked Paprika'), 
    (1001, 'Olive Oil'), 
    (1001, 'Balsamic Vinegar'), 
    (1001, 'Quinoa'), 
    (1001, 'Greek Feta'), 
    (1001, 'Baby Arugula'), 
    (1001, 'Tomatoes'), 
    (1001, 'Cucumbers'), 
    (1001, 'Hummus'), 
    (1001, 'Lemon Juice'), 
    (1001, 'Sea Salt'), 
    (1001, 'Black Pepper'), 
    (1002, 'Salmon'), 
    (1002, 'Kosher Salt'), 
    (1002, 'Black Pepper'), 
    (1002, 'Sun-Dried Tomatoes'), 
    (1002, 'Shallots'), 
    (1002, 'Garlic'), 
    (1002, 'Spinach'), 
    (1002, 'White Wine'), 
    (1002, 'Heavy Cream'), 
    (1002, 'Parsley'), 
    (1003, 'Ground Beef'), 
    (1003, 'Onion'), 
    (1003, 'Garlic'), 
    (1003, 'Eggs'), 
    (1003, 'Ketchup'), 
    (1003, 'Worcestershire Sauce'), 
    (1003, 'Quick Cooking Oats'), 
    (1003, 'Milk'), 
    (1003, 'Parsley'), 
    (1003, 'Italian Seasoning'), 
    (1003, 'Kosher Salt'), 
    (1003, 'Black Pepper'), 
    (1003, 'Coconut Sugar'), 
    (1004, 'Bananas'), 
    (1004, 'Almond Butter'), 
    (1004, 'Chocolate Chips'), 
    (1004, 'Baking Powder'), 
    (1004, 'Cacao Powder'), 
    (1004, 'Coconut Sugar'), 
    (1005, 'Italian Basil Leaves'), 
    (1005, 'Unsalted Cashews'), 
    (1005, 'Lemon Juice'), 
    (1005, 'Nutritional Yeast'), 
    (1005, 'Pasta'), 
    (1005, 'Cherry Tomatoes'), 
    (1005, 'Oat Milk'), 
    (1005, 'Salt'), 
    (1005, 'Garlic'),
    (1006, 'Canned Chickpeas'),
    (1006, 'Breadcrumbs'),
    (1006, 'Eggs'),
    (1006, 'Italian Parsley'),
    (1006, 'Garlic'),
    (1006, 'Red Onion'),
    (1006, 'Italian Seasoning'),
    (1006, 'Smoked Paprika'),
    (1006, 'Black Pepper'),
    (1006, 'Salt'),
    (1006, 'Olive Oil'),
    (1007, 'Unsalted Butter'),
    (1007, 'Garlic'),
    (1007, 'Salt'),
    (1007, 'Dried Oregano'),
    (1007, 'Crushed Red Pepper Flakes'),
    (1007, 'Black Pepper'),
    (1007, 'Sun-Dried Tomatoes'),
    (1007, 'Vegetable Broth'),
    (1007, 'Canned Chickpeas'),
    (1007, 'Heavy Cream'),
    (1007, 'Parmesan'),
    (1007, 'Italian Basil Leaves'),
    (1008, 'Gluten-Free Bread Mix'),
    (1008, 'Granulated Sugar'),
    (1008, 'Instant Yeast'),
    (1008, 'Baking Powder'),
    (1008, 'Baking Soda'),
    (1008, 'Kosher Salt'),
    (1008, 'Water'),
    (1008, 'Unsalted Butter'),
    (1008, 'Apple Cider Vinegar'),
    (1008, 'Eggs'),
    (1008, 'Egg Whites'),
    (1008, 'Corn Starch'),
    (1008, 'Brown Sugar'),
    (1008, 'Cinnamon'),
    (1008, 'Cream Cheese'),
    (1008, 'Powdered Sugar'),
    (1008, 'Vanilla Bean Paste'),
    (1009, 'Sweet Potato'),
    (1009, 'Olive Oil'),
    (1009, 'Garlic Powder'),
    (1009, 'Paprika'),
    (1009, 'Ground Cumin'),
    (1009, 'Kosher Salt'),
    (1009, 'Black Pepper'),
    (1009, 'Bacon'),
    (1009, 'Breakfast Sausage'),
    (1009, 'Onion'),
    (1009, 'Green Bell Pepper'),
    (1009, 'Garlic'),
    (1009, 'Eggs'),
    (1009, 'Milk'),
    (1009, 'Shredded Cheese'),
    (1009, 'Green Onion'),
    (1010, 'Ground Beef'),
    (1010, 'Taco Seasoning'),
    (1010, 'Kosher Salt'),
    (1010, 'Black Pepper'),
    (1010, 'Romaine Lettuce'),
    (1010, 'Iceberg Lettuce'),
    (1010, 'Cherry Tomatoes'),
    (1010, 'Canned Black Beans'),
    (1010, 'Avocado'),
    (1010, 'Shredded Cheese'),
    (1010, 'Salsa'),
    (1010, 'Red Onion'),
    (1010, 'Cilantro'),
    (1010, 'Lime'),
    (1010, 'Tortilla Chips'),
    (1011, 'Olive Oil'),
    (1011, 'Onion'),
    (1011, 'Red Bell Pepper'),
    (1011, 'Garlic'),
    (1011, 'Paprika'),
    (1011, 'Ground Cumin'),
    (1011, 'Chili Powder'),
    (1011, 'Canned Whole Peeled Tomatoes'),
    (1011, 'Eggs'),
    (1011, 'Salt'),
    (1011, 'Black Pepper'),
    (1011, 'Cilantro'),
    (1011, 'Parsley'),
    (1012, 'Chicken Breast'),
    (1012, 'Arrowroot Powder'),
    (1012, 'Lemon Pepper Seasoning'),
    (1012, 'Kosher Salt'),
    (1012, 'Olive Oil'),
    (1012, 'Unsalted Butter'),
    (1012, 'Garlic'),
    (1012, 'Lemon Juice'),
    (1012, 'Low-Sodium Chicken Broth'),
    (1012, 'Parsley'),
    (1012, 'Lemon');

-- ***************************
-- Part C
-- ***************************

-- Query 1
-- Purpose: Retrieve the ingredients associated with each recipe.
-- Expected Result: Each row will contain the recipe name along with the corresponding ingredients.
SELECT R.Recipe_name, IR.Ingredient_name
FROM RECIPES R
JOIN RECIPE_INGREDIENTS RI ON R.Recipe_id = RI.Recipe_id
JOIN INGREDIENTS IR ON RI.Ingredient_name = IR.Ingredient_name;


-- Query 2
-- Purpose: Retrieve the total number of recipes in each recipe category.
-- Expected Result: Each row will contain the recipe category along with the total number of recipes in that category.
SELECT Recipe_category, COUNT(*) AS Total_Recipes
FROM RECIPES
GROUP BY Recipe_category;


-- Query 3
-- Purpose: Retrieve the list of recipes along with their authors and average ratings, sorted by the average rating in descending order.
-- Expected Result: Each row will contain the recipe name, author's first and last name, and the average rating of the recipe, sorted by the average rating in descending order.
SELECT 
    R.Recipe_name,
    CONCAT(U.User_fname, ' ', U.User_lname) AS Author,
    AVG(RA.Recipe_rating) AS Average_Rating
FROM 
    RECIPES R
INNER JOIN 
    USERS U ON R.Recipe_author = U.User_id
LEFT JOIN 
    USER_RATINGS RA ON R.Recipe_id = RA.Recipe_id
GROUP BY 
    R.Recipe_id
ORDER BY 
    Average_Rating DESC;




-- Query 4
-- Purpose: Retrieve a list of ingredients along with their prices and categories, including those with no restrictions.
-- Expected Result: Each row will contain the ingredient name, price, category, and will include ingredients with no restrictions.
SELECT 
    I.Ingredient_name,
    I.Ingredient_price,
    I.Ingredient_cat
FROM 
    INGREDIENTS I
LEFT JOIN 
    INGREDIENT_RESTRICTIONS IR ON I.Ingredient_name = IR.Ingredient_name
WHERE 
    IR.Ingredient_name IS NULL;



-- Query 5
-- Purpose: Retrieve a list of ingredients that are suitable for a specific restriction.
-- Expected Result: Ingredients that are suitable for a specific restriction, along with their names, prices, and categories.
SELECT 
    I.Ingredient_name,
    I.Ingredient_price,
    I.Ingredient_cat
FROM 
    INGREDIENTS I
JOIN 
    INGREDIENT_RESTRICTIONS IR ON I.Ingredient_name = IR.Ingredient_name
JOIN 
    RESTRICTIONS R ON IR.Restriction_id = R.Restriction_id
WHERE 
    R.Restriction_name = 'Vegan';



-- Query 6
-- Purpose: Retrieve recipes along with their ingredients, author names, and ratings.
-- Expected Result: A list of recipes with their associated ingredients, author names, and ratings.
SELECT 
    R.Recipe_id,
    R.Recipe_name,
    R.Recipe_category,
    R.Recipe_price,
    U.User_fname || ' ' || U.User_lname AS Author_name,
    R.Recipe_rating
FROM 
    RECIPES R
JOIN 
    USERS U ON R.Recipe_author = U.User_id
JOIN 
    RECIPE_INGREDIENTS RI ON R.Recipe_id = RI.Recipe_id;



-- Query 7
-- Purpose: Retrieve the top-rated recipes in a specific category.
-- Expected Result: A list of the top-rated recipes within the specified category.
SELECT 
    R.Recipe_id,
    R.Recipe_name,
    R.Recipe_category,
    R.Recipe_price,
    U.User_fname || ' ' || U.User_lname AS Author_name,
    R.Recipe_rating
FROM 
    RECIPES R
JOIN 
    USERS U ON R.Recipe_author = U.User_id
WHERE 
    R.Recipe_category = 'Dinner'
ORDER BY 
    R.Recipe_rating DESC
LIMIT 5;



-- Query 8
-- Purpose: Retrieve recipes that contain a specific ingredient.
-- Expected Result: A list of recipes that include the specified ingredient.
SELECT 
    R.Recipe_id,
    R.Recipe_name,
    R.Recipe_category,
    U.User_fname || ' ' || U.User_lname AS Author_name
FROM 
    RECIPES R
JOIN 
    USERS U ON R.Recipe_author = U.User_id
JOIN 
    RECIPE_INGREDIENTS RI ON R.Recipe_id = RI.Recipe_id
JOIN 
    INGREDIENTS I ON RI.Ingredient_name = I.Ingredient_name
WHERE 
    I.Ingredient_name = 'Spinach';



-- Query 9
-- Purpose: Retrieve recipes and their associated ingredients along with the ingredient categories.
-- Expected Result: A list of recipes with their ingredients and corresponding categories.
SELECT 
    R.Recipe_id,
    R.Recipe_name,
    I.Ingredient_name,
    I.Ingredient_cat
FROM 
    RECIPES R
JOIN 
    RECIPE_INGREDIENTS RI ON R.Recipe_id = RI.Recipe_id
JOIN 
    INGREDIENTS I ON RI.Ingredient_name = I.Ingredient_name;



-- Query 10
-- Purpose: Retrieve recipes along with the names of users who authored them, sorted by the recipe upload date.
-- Expected Result: A list of recipes with their authors, sorted by the upload date in ascending order.
SELECT 
    R.Recipe_id,
    R.Recipe_name,
    CONCAT(U.User_fname, ' ', U.User_lname) AS Author_Name,
    R.Recipe_uploaddate
FROM 
    RECIPES R
JOIN 
    USERS U ON R.Recipe_author = U.User_id
ORDER BY 
    R.Recipe_uploaddate ASC;



