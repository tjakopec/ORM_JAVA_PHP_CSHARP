package jakopec.model;

import jakarta.persistence.*;

import java.util.Date;

@Entity
@Inheritance(strategy = InheritanceType.SINGLE_TABLE)
@DiscriminatorColumn(name = "vrsta", discriminatorType = DiscriminatorType.STRING)
@Table(name = "mjesanje")
public abstract class Mjesanje extends Entitet {

    public abstract Rezulat getRezultat();

    private boolean stiglja;
    private boolean belot;
    @Column(name = "datumunosa")
    private Date datumUnosa = new Date();

    @ManyToOne(targetEntity = PartijaTriIgraca.class, cascade=CascadeType.ALL, fetch = FetchType.LAZY)
    @JoinColumn(name="partija")
    private Partija partija;

    public Partija getPartija() {
        return partija;
    }

    public void setPartija(Partija partija) {
        this.partija = partija;
    }

    public boolean isBelot() {
        return belot;
    }

    public void setBelot(boolean belot) {
        this.belot = belot;
    }

    public boolean isStiglja() {
        return stiglja;
    }

    public void setStiglja(boolean stiglja) {
        this.stiglja = stiglja;
    }

    public Date getDatumUnosa() {
        return datumUnosa;
    }

    public void setDatumUnosa(Date datumUnosa) {
        this.datumUnosa = datumUnosa;
    }

}
