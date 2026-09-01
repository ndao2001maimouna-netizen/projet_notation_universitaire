<?php
class CopieExamen extends AbstractDocument 
{
    private float $noteBrute;
    private float $penaliteAppliquee;
    private float $noteFinale;
    private DateTime $dateLimite;

    public function __construct(
        DateTime $dateDepot,
        DateTime $dateLimite,
        float $noteBrute,
        float $penaliteAppliquee = 0.0,
        ?int $id = null
    ) {
        parent::__construct($dateDepot, $id);
        
        $this->dateLimite = $dateLimite;
        $this->setNoteBrute($noteBrute); 
        $this->penaliteAppliquee = $penaliteAppliquee;
        $this->calculerNoteFinale();
    }

    public function setNoteBrute(float $noteBrute): void 
    {
        if ($noteBrute < 0 || $noteBrute > 20) {
            throw new InvalidArgumentException("La note doit être comprise entre 0 et 20.");
        }
        $this->noteBrute = $noteBrute;
        $this->calculerNoteFinale();
    }

    private function calcularNoteFinale(): void 
    {
        $calcul = $this->noteBrute - $this->penaliteAppliquee;
        $this->noteFinale = max(0, $calcul); 
    }

    public function getNoteBrute(): float { return $this->noteBrute; }
    public function getPenaliteAppliquee(): float { return $this->penaliteAppliquee; }
    public function getNoteFinale(): float { return $this->noteFinale; }
    public function getDateLimite(): DateTime { return $this->dateLimite; }
}







