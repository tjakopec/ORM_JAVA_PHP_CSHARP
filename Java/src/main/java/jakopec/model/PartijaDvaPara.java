package jakopec.model;


import jakarta.persistence.DiscriminatorValue;
import jakarta.persistence.Entity;
import jakarta.persistence.MappedSuperclass;
import jakarta.persistence.Table;

@Entity
@DiscriminatorValue("dvaPara")
public class PartijaDvaPara extends Partija {

    @Override
    public String toString() {
        Rezulat rezulat = getRezultat();
        return "Partija DVA PARA, igra gotova: " + (isIgraGotova() ? "DA" : "NE") + ", " +
                getIgraci().get(0) + " i " + getIgraci().get(1) + ": " + rezulat.getPrvi() + " | "+
                getIgraci().get(2) + " i " + getIgraci().get(3)  + ": " + rezulat.getDrugi();
    }


}
