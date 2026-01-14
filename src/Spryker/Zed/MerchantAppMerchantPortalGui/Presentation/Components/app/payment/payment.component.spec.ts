import { Component, NO_ERRORS_SCHEMA } from '@angular/core';
import { ComponentFixture, TestBed } from '@angular/core/testing';
import { By } from '@angular/platform-browser';
import { PaymentComponent } from './payment.component';

@Component({
    standalone: false,
    template: `
        <mp-payment>
            <span status></span>
            <span footer></span>
            <span class="default-slot"></span>
        </mp-payment>
    `,
})
class TestHostComponent {}

describe('PaymentComponent', () => {
    let fixture: ComponentFixture<TestHostComponent>;

    beforeEach(() => {
        TestBed.configureTestingModule({
            declarations: [PaymentComponent, TestHostComponent],
            schemas: [NO_ERRORS_SCHEMA],
        });

        fixture = TestBed.createComponent(TestHostComponent);
    });

    it('should render `status` slot to the `.mp-payment__status` div', () => {
        fixture.detectChanges();
        const statusSlot = fixture.debugElement.query(By.css('.mp-payment__status [status]'));

        expect(statusSlot).toBeTruthy();
    });

    it('should render `footer` slot to the `.mp-payment__footer`', () => {
        fixture.detectChanges();
        const footerSlot = fixture.debugElement.query(By.css('.mp-payment__footer [footer]'));

        expect(footerSlot).toBeTruthy();
    });

    it('should render default slot to the `mp-payment__action` div', () => {
        fixture.detectChanges();
        const defaultSlot = fixture.debugElement.query(By.css('.mp-payment__action .default-slot'));

        expect(defaultSlot).toBeTruthy();
    });
});
