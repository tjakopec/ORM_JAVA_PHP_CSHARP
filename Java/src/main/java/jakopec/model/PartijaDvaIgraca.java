package jakopec.model;

import jakarta.persistence.DiscriminatorValue;
import jakarta.persistence.Entity;
import jakarta.persistence.MappedSuperclass;
import jakarta.persistence.Table;
import org.hibernate.annotations.Polymorphism;
import org.hibernate.annotations.PolymorphismType;

@Entity
@DiscriminatorValue("dvaIgraca")
@Polymorphism(type = PolymorphismType.EXPLICIT)
public class PartijaDvaIgraca extends Partija {


    @Override
    public String toString() {
        Rezulat rezultat = getRezultat();
        return "Partija DVA IGRAČA, igra gotova: " + (isIgraGotova() ? "DA" : "NE") + ", " + getIgraci().get(0) + ": " +
                rezultat.getPrvi() +
                " | "+ getIgraci().get(1) + ": " + rezultat.getDrugi();
    }

}
