CREATE Table User_Table (
ID seiral PRIMARY KEY,
UserName VARCHAR(80) UNIQUE NOT NULL,
FirstName VARCHAR(80) UNIQUE NOT NULL,
LastName VARCHAR(80) UNIQUE NOT NULL);

CREATE TABLE MeasurementType (
ID serial PRIMARY KEY,
MeasurementName VARCHAR(80) UNIQUE NOT NULL);

CREATE TABLE MeasurementSize (
ID serial PRIMARY KEY,
MeasurementSize VARCHAR(10) UNIQUE NOT NULL);

CREATE TABLE FoodType (
ID serial PRIMARY KEY,
TypeName VARCHAR(80) UNIQUE NOT NULL);

CREATE TABLE MealCategory (
ID serial PRIMARY KEY,
CategoryName VARCHAR(80) UNIQUE NOT NULL);

CREATE TABLE IngredientType (
ID serial PRIMARY KEY,
TypeName VARCHAR(80) UNIQUE NOT NULL);

CREATE TABLE Ingredients (
ID serial PRIMARY KEY,
IngredientName VARCHAR(80) NOT NULL,
IngredientType_ID INT NOT NULL REFERENCES IngredientType(ID));

CREATE TABLE Recipe (
ID serial PRIMARY KEY,
RecipeName VARCHAR(80) NOT NULL,
Directions TEXT,
FoodType_ID INT NOT NULL REFERENCES FoodType(ID),
MealCategory_ID INT NOT NULL REFERENCES MealCategory(ID),
User_ID INT NOT NULL REFERENCES User_Table(ID));

CREATE TABLE RecipeItems (
ID serial PRIMARY KEY,
Ingredient VARCHAR(255) NOT NULL ,
MeasurementSize_ID INT NOT NULL REFERENCES MeasurementSize(ID),
MeasurementType_ID INT NOT NULL REFERENCES MeasurementType(ID),
Recipe_ID INT NOT NULL REFERENCES Recipe(ID));