-- This query updates or crates someone's Gaimon.
INSERT INTO GaimonAndYou.Gaimons(ownerEmail, name, glasses, stick, hat, mood, battlesWon) 
    VALUES (?, ?, ?, ?, ?, ?, ?)
    ON DUPLICATE KEY UPDATE 
        name = VALUES(name),
        glasses = VALUES(glasses), 
        stick = VALUES(stick), 
        hat = VALUES(hat), 
        mood = VALUES(mood), 
        battlesWon = VALUES(battlesWon)