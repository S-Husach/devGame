<template>
  <app-layout>
    <!-- Page Heading -->
    <header class="bg-white shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <slot name="header">
          <h2 class="text-2xl font-semibold ml-5 leading-tight">Rules</h2>
        </slot>
      </div>
    </header>

    <div class="py-4">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="my-2 mb-6 flex sm:flex-row flex-col">
          <div class="flex flex-row mb-8 sm:mb-0 ml-5">
          </div>
        </div>

<!-- Table into the card -->

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5 text-xl">
            <h1>Ежемесячно суммируем оттреченное время каждым девом с баллами, которыми другие девы оценят по трем критериям (курирование, стиль кода и ответственность).
Каждый месяц в итоговую таблицу попадает 21 дев с наибольшим числом часов за этот месяц, среди них по сумме оттреченных часов и оценок других девов определяем тройку призеров этого месяца (тура).
Каждый месяц можно/нужно единожды оценить девов команды, если не выбрать ни одного дева, то в этом месяце нельзя перейти к выбору заполнения собственных ачивок. Если есть необходимость проголосовать "против всех", то выбирай @aid78 этот дев никогда не попадет в итоговый список ибо не имеет оттреченных часов))
Каждая выполненная ачивка увеличивает коэффициент, с которым будут учитываться голоса, одданые за тебя, на 0.02, максимальный коэффициент составляет 2 при выполнении условий 50 ачивок.
Для желающих получить ачивку "получить сертификат" предлагается частичная компенсация стоимости, а именно половина стоимости за неудачную попытку и полное покрытие за удачную попытку (при условии наличия аккаунта на апворке на это имя и согласии прикрепить сертификат к этому профилю). Список сертификатов смотри ниже:
<p>1. авс любой сертификат, но не уровень Cloud Practitioner</p>
<p>2. CKA / CKAD / LFCE</p>
<p>3. Laravel , symfony, zend PHP не ниже 7.2</p>
<p>4. Oracle certified professional (MySQL) (не specialist)</p>
<p>5. Scrum developer + professional (только при условии сдачи pro , для него необходимо сначала сдать developer)</p>
            </h1>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },
};
</script>
