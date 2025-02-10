<!-- Modal Bootstrap -->
<div class="modal fade" id="demoAccountModal" tabindex="-1" aria-labelledby="demoAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg">
        <div class="modal-header border-0 bg-light">
          <h5 class="modal-title fw-bold text-primary" id="demoAccountModalLabel">
            Choisissez un type d'utilisateur
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body py-4">
          <div class="d-flex justify-content-around text-center gap-3">
            <!-- Option 1 : Censeur -->
            <div class="user-option p-4 rounded-3" id="censeur-option">
              <div class="icon-wrapper mb-3">
                <i class="bi bi-shield-check fs-1"></i>
              </div>
              <h6 class="fw-bold mb-2">Censeur</h6>
              <p class="text-muted small mb-0">
                Gérez les accès et contrôlez les activités.
              </p>
            </div>
            <!-- Option 2 : Élève -->
            <div class="user-option p-4 rounded-3" id="eleve-option">
              <div class="icon-wrapper mb-3">
                <i class="bi bi-mortarboard fs-1"></i>
              </div>
              <h6 class="fw-bold mb-2">Élève</h6>
              <p class="text-muted small mb-0">
                Accédez à vos cours ainsi qu'à vos emplois du temps
              </p>
            </div>
            <!-- Option 3 : Professeur -->
            <div class="user-option p-4 rounded-3" id="professeur-option">
              <div class="icon-wrapper mb-3">
                <i class="bi bi-person fs-1"></i>
              </div>
              <h6 class="fw-bold mb-2">Professeur</h6>
              <p class="text-muted small mb-0">
                Gérez vos cours, vos documents et vos emplois du temps.
              </p>
            </div>
          </div>
        </div>
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-light-custom px-4" data-bs-dismiss="modal">
            Fermer
          </button>
        </div>
      </div>
    </div>
  </div>
  
  <style>
  .modal-content {
    background-color: #ffffff;
    border-radius: 1rem;
  }
  
  .modal-title {
    color: #4a55a2;
    font-size: 1.25rem;
  }
  
  .user-option {
    background-color: #f8f9fa;
    border: 2px solid transparent;
    transition: all 0.3s ease;
    flex: 1;
    min-width: 0;
  }
  
  .user-option:hover {
    border-color: #4a55a2;
    background-color: #ffffff;
    transform: translateY(-5px);
    cursor: pointer;
  }
  
  .icon-wrapper {
    height: 60px;
    width: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    border-radius: 50%;
    background-color: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  
  /* Couleurs spécifiques pour chaque icône */
  .user-option:nth-child(1) .icon-wrapper i {
    color: #4a55a2;
  }
  
  .user-option:nth-child(2) .icon-wrapper i {
    color: #2ea44f;
  }
  
  .user-option:nth-child(3) .icon-wrapper i {
    color: #f59e0b;
  }
  
  /* Nouveau style pour le bouton Fermer */
  .btn-light-custom {
    background-color: #e9ecef;
    border: none;
    border-radius: 0.5rem;
    color: #495057;
    transition: all 0.3s ease;
  }
  
  .btn-light-custom:hover {
    background-color: #dee2e6;
    color: #212529;
  }
  </style>