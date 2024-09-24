
<?php get_header(); ?>

<?php echo apply_shortcodes( '[contact-form-7 id="05f55a8" title="contact"]' ); ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const select = document.querySelector('.wpcf7-select');
  const customSelect = document.createElement('div');
  customSelect.classList.add('custom-select');

  const selected = document.createElement('span');
  selected.classList.add('selected');
  selected.innerText = '選択してください';
  customSelect.appendChild(selected);

  const arrow = document.createElement('i');
  arrow.classList.add('arrow');
  customSelect.appendChild(arrow);

  const optionsContainer = document.createElement('ul');
  optionsContainer.classList.add('options');

  Array.from(select.options).forEach((option, index) => {
    if (index === 0) return;// 最初のoptionをスキップ

    const customOption = document.createElement('li');
    customOption.classList.add('option');
    customOption.innerText = option.text;

    customOption.addEventListener('click', function() {
      event.stopPropagation();
      console.log('click');
      selected.innerText = this.innerText;
      select.value = option.value; // 元の<select>にも値を設定
      optionsContainer.classList.remove('open');
    });

    optionsContainer.appendChild(customOption);
  });

  customSelect.appendChild(optionsContainer);
  select.style.display = 'none'; // 元の<select>を隠す
  select.parentNode.insertBefore(customSelect, select);

  customSelect.addEventListener('click', function() {
    optionsContainer.classList.toggle('open');
  });
});


</script>

<?php get_footer(); ?>
