package jakopec.model.live;

import jakarta.persistence.Entity;
import jakarta.persistence.OneToMany;

import java.util.List;

@Entity
public class Mjesto extends NadKlasa {

    private String naziv;

    @OneToMany(mappedBy = "mjesto")
    private List<Predavanje> odrzanaPredavanja;

    public List<Predavanje> getOdrzanaPredavanja() {
        return odrzanaPredavanja;
    }

    public void setOdrzanaPredavanja(List<Predavanje> odrzanaPredavanja) {
        this.odrzanaPredavanja = odrzanaPredavanja;
    }

    public String getNaziv() {
        return naziv;
    }

    public void setNaziv(String naziv) {
        this.naziv = naziv;
    }
}
