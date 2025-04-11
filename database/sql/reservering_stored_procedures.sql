-- Procedure to get confirmed reservations up to a specific date
DELIMITER //
CREATE PROCEDURE GetConfirmedReservations(IN cutoff_date DATE)
BEGIN
    SELECT
        r.id,
        r.persoon_id,
        r.openingstijd_id,
        r.baan_id,
        r.pakketoptie_id,
        r.reservering_status,
        r.reserveringsnummer,
        r.datum,
        r.aantal_uren,
        r.begin_tijd,
        r.eind_tijd,
        r.aantal_volwassen,
        r.aantal_kinderen,
        r.datum_aangemaakt,
        r.datum_gewijzigd,
        p.voornaam,
        p.tussenvoegsel,
        p.achternaam,
        po.naam AS pakketoptie_naam,
        b.nummer AS baan_nummer
    FROM
        reserveringen r
    INNER JOIN persoons p ON r.persoon_id = p.id
    INNER JOIN baans b ON r.baan_id = b.id
    LEFT JOIN pakket_opties po ON r.pakketoptie_id = po.id
    WHERE
        r.reservering_status = 'Bevestigd'
        AND r.datum <= cutoff_date
    ORDER BY
        r.datum DESC;
END //
DELIMITER ;

-- Procedure to update a reservation's package option
DELIMITER //
CREATE PROCEDURE UpdateReservationPackage(
    IN reservation_id INT,
    IN new_pakketoptie_id INT,
    OUT result_message VARCHAR(255)
)
BEGIN
    DECLARE has_children BOOLEAN DEFAULT FALSE;
    DECLARE pakket_name VARCHAR(255);

    -- Check if the reservation has children
    SELECT aantal_kinderen > 0 INTO has_children
    FROM reserveringen
    WHERE id = reservation_id;

    -- If new package is set, check the package name
    IF new_pakketoptie_id IS NOT NULL THEN
        SELECT naam INTO pakket_name
        FROM pakket_opties
        WHERE id = new_pakketoptie_id;

        -- Check if the package is appropriate for children
        IF pakket_name = 'Vrijgezellenfeest' AND has_children = TRUE THEN
            SET result_message = 'ERROR: Het optiepakket vrijgezellenfeest is niet bedoelt voor kinderen';
        ELSE
            -- Update the package option
            UPDATE reserveringen
            SET pakketoptie_id = new_pakketoptie_id,
                datum_gewijzigd = CURRENT_TIMESTAMP
            WHERE id = reservation_id;

            SET result_message = 'SUCCESS: Het optiepakket is gewijzigd';
        END IF;
    ELSE
        -- Update with NULL (no package)
        UPDATE reserveringen
        SET pakketoptie_id = NULL,
            datum_gewijzigd = CURRENT_TIMESTAMP
        WHERE id = reservation_id;

        SET result_message = 'SUCCESS: Het optiepakket is verwijderd';
    END IF;
END //
DELIMITER ;

-- Procedure to get a single reservation with related data
DELIMITER //
CREATE PROCEDURE GetReservationDetails(IN reservation_id INT)
BEGIN
    SELECT
        r.id,
        r.persoon_id,
        r.openingstijd_id,
        r.baan_id,
        r.pakketoptie_id,
        r.reservering_status,
        r.reserveringsnummer,
        r.datum,
        r.aantal_uren,
        r.begin_tijd,
        r.eind_tijd,
        r.aantal_volwassen,
        r.aantal_kinderen,
        r.datum_aangemaakt,
        r.datum_gewijzigd,
        p.voornaam,
        p.tussenvoegsel,
        p.achternaam,
        p.roepnaam
    FROM
        reserveringen r
    INNER JOIN persoons p ON r.persoon_id = p.id
    WHERE
        r.id = reservation_id;
END //
DELIMITER ;

-- Procedure to get all active package options
DELIMITER //
CREATE PROCEDURE GetAllPakketOpties()
BEGIN
    SELECT
        id,
        naam,
        is_active,
        opmerking,
        datum_aangemaakt,
        datum_gewijzigd
    FROM
        pakket_opties
    WHERE
        is_active = 1
    ORDER BY
        naam;
END //
DELIMITER ;
