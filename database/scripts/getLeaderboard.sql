-- This query gives you the top 3 users with highest wins and their Gaimons' names.
SELECT ownerEmail, name, battlesWon FROM GaimonAndYou.Gaimons ORDER BY battlesWon DESC LIMIT 3;