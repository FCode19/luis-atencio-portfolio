</main>
<footer class="portfolio-footer">
    <div class="container footer-grid">
        <div>
            <a class="footer-brand" href="/">Luis Atencio</a>
            <p><?= bilingual('AI, automation and systems engineering with an operational focus.', 'IA, automatización e ingeniería de sistemas con enfoque operativo.') ?></p>
        </div>
        <div class="footer-links" aria-label="Social links">
            <a href="<?= e(GITHUB_URL) ?>" target="_blank" rel="noopener noreferrer"><i class="bi bi-github" aria-hidden="true"></i> GitHub</a>
            <a href="<?= e(LINKEDIN_URL) ?>" target="_blank" rel="noopener noreferrer"><i class="bi bi-linkedin" aria-hidden="true"></i> LinkedIn</a>
        </div>
        <div class="footer-visitor-counter" aria-label="<?= e('Portfolio visit counter') ?>">
            <span class="visitor-icon"><i class="bi bi-eye" aria-hidden="true"></i></span>
            <span><strong><?= e(number_format((int) ($visitorCount ?? 0))) ?></strong><small><?= bilingual('visits recorded', 'visitas registradas') ?></small></span>
        </div>
        <small>© <?= date('Y') ?> Luis Atencio. <?= bilingual('Built with PHP and careful attention to detail.', 'Construido con PHP y atención al detalle.') ?></small>
    </div>
</footer>
<div class="lightbox" id="portfolioLightbox" hidden aria-hidden="true">
    <div class="lightbox-backdrop" data-lightbox-close></div>
    <div class="lightbox-dialog" role="dialog" aria-modal="true" aria-labelledby="lightboxCaption">
        <button class="lightbox-close" type="button" data-lightbox-close aria-label="Close image"><i class="bi bi-x-lg" aria-hidden="true"></i></button>
        <img class="lightbox-image" src="" alt="">
        <p class="lightbox-caption" id="lightboxCaption"></p>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= asset('js/app.js') ?>"></script>
</body>
</html>
