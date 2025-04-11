

CREATE PROCEDURE GetUitslagenByReservering(IN reserveringId INT)
BEGIN
    SELECT 
        CONCAT(p.voornaam, ' ', IFNULL(p.tussenvoegsel, ''), ' ', p.achternaam) AS naam,
        u.id AS UitslagId,
        u.SpelId,
        u.Aantalpunten,
        s.ReserveringId
    FROM 
        uitslag u
    INNER JOIN 
        spel s ON u.SpelId = s.id
    INNER JOIN 
        persoon p ON s.PersoonId = p.id
    WHERE 
        s.ReserveringId = reserveringId
    ORDER BY 
        u.Aantalpunten DESC;
END 



