-- This query selects a user's Gaimon, user's email is passed as parameter.
SELECT * FROM GaimonAndYou.Gaimons WHERE ownerEmail = ?;