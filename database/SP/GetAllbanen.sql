CREATE PROCEDURE GetAllBanen()
BEGIN
    SELECT 
        CONCAT(p.voornaam, ' ', IFNULL(p.tussenvoegsel, ''), ' ', p.achternaam) AS naam,
        r.datum,
        r.aantal_volwassen,
        r.aantal_kinderen,
        b.nummer AS baan
    FROM 
        reserveringen r
    INNER JOIN 
        persoon p ON r.persoon_id = p.id
    INNER JOIN 
        baan b ON r.baan_id = b.id;
END;
