KB.on('dom.ready', function () {
    KB.onClick(".PAM_toggleVisibility", function (e) {
      KB.http.get("/?controller=ProjectActivityModificationController&action=toggleVisibility&plugin=PAM&event_id=" + e.target.dataset.event_id);
      e.target.children[0].classList.toggle('fa-eye-slash');
      e.target.children[0].classList.toggle('fa-eye');
  });
});