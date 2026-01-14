import { Component, NO_ERRORS_SCHEMA } from '@angular/core';
import { ComponentFixture, TestBed } from '@angular/core/testing';
import { By } from '@angular/platform-browser';
import { PaymentsComponent } from './payments.component';

@Component({
    standalone: false,
    template: `
        <mp-payments>
            <span title></span>
            <span action></span>
            <span class="default-slot"></span>
        </mp-payments>
    `,
})
class TestHostComponent {}

describe('PaymentsComponent', () => {
    let fixture: ComponentFixture<TestHostComponent>;

    beforeEach(() => {
        TestBed.configureTestingModule({
            declarations: [PaymentsComponent, TestHostComponent],
            schemas: [NO_ERRORS_SCHEMA],
        });

        fixture = TestBed.createComponent(TestHostComponent);
    });

    describe('Payments header', () => {
        it('should render <spy-headline> component', () => {
            fixture.detectChanges();
            const headlineComponent = fixture.debugElement.query(By.css('spy-headline'));

            expect(headlineComponent).toBeTruthy();
        });

        it('should render `title` slot to the <spy-headline> component', () => {
            fixture.detectChanges();
            const titleSlot = fixture.debugElement.query(By.css('spy-headline [title]'));

            expect(titleSlot).toBeTruthy();
        });

        it('should render `action` slot to the <spy-headline> component', () => {
            fixture.detectChanges();
            const actionSlot = fixture.debugElement.query(By.css('spy-headline [action]'));

            expect(actionSlot).toBeTruthy();
        });
    });

    describe('Payments content', () => {
        it('should render default slot after spy-headline component', () => {
            fixture.detectChanges();
            const defaultSlot = fixture.debugElement.query(By.css('spy-headline + .default-slot'));

            expect(defaultSlot).toBeTruthy();
        });
    });
});
