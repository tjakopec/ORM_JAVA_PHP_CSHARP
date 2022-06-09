package jakopec.model;

import jakarta.persistence.DiscriminatorValue;
import jakarta.persistence.Entity;
import jakarta.persistence.Table;

@Entity
@DiscriminatorValue("triIgraca")
public class PartijaTriIgraca extends PartijaDvaIgraca {

    @Override
    public String toString() {
        Rezulat rezulat = getRezultat();
        return "Partija TRI IGRAČA, igra gotova: " + (isIgraGotova() ? "DA" : "NE") + ", " +
                getIgraci().get(0) + ": " + rezulat.getPrvi() +" | "+
                getIgraci().get(1) + ": " + rezulat.getDrugi() + " | "+
                getIgraci().get(2) + ": " + rezulat.getTreci();
    }

    @Override
    public Rezulat getRezultat() {
        Rezulat rezultat = super.getRezultat();
                rezultat.setTreci(getMjesanja().stream().mapToInt(x -> x.getRezultat().getTreci()).sum());
        return rezultat;
    }
}
