-- Display all data
SELECT * FROM students JOIN school ON students.school = school.idschool;

-- Shows only first names
SELECT prenom FROM students;

-- Shows the names, birth dates and school for each student 
SELECT students.prenom, students.nom, students.datenaissance, school.school FROM students JOIN school ON students.school = school.idschool;

-- Shows only students who are female
SELECT * FROM students JOIN school ON students.school = school.idschool WHERE students.genre = 'F';

-- Shows only students who are part of Charleroi school
SELECT * FROM students JOIN school ON students.school = school.idschool WHERE school.idschool = '2';

-- Shows only the first names of the students in reverse alphabetical order
-- Then the same thing but limiting the results to 2
SELECT prenom FROM students ORDER BY prenom DESC;
SELECT prenom FROM students ORDER BY prenom DESC LIMIT 2;


-- Add Ginette Dalor, born 01/01/1930 and assign her to Central
INSERT INTO students (nom, prenom, datenaissance, genre, school) VALUES ('Dalor', 'Ginette', '1930-01-01', 'F', '1');

-- Modify Ginette and change his sex and his name to "Omer"
UPDATE students SET prenom = 'Omer', genre = 'M' WHERE nom = 'Dalor' AND prenom = 'Ginette';

-- Delete the person whose ID is 3
DELETE FROM students WHERE idStudent = '3';

-- Change the contents of the school column so that "1" is replaced by "Brussels" and "2" is replaced by "Charleroi"
-- UPDATE students SET school = school.school FROM students JOIN school ON students.school = school.idschool;

-- Do other manipulations to see if you are well understood